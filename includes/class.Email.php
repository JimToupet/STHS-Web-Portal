<?  
//** ©William Fowler (wmfwlr@cogeco.ca) 
//** MAY 13/2004, Version 1.1
//** - added support for CC and BCC fields.
//** - added support for multipart/alternative messages.
//** - added ability to create attachments manually using literal content.
//** DECEMBER 15/2003, Version 1.0 

  if(isset($GLOBALS["emailmsgclass_php"])) { return; }  //** onlyinclude once. 
  $GLOBALS["emailmsgclass_php"] = 1;                    //** filewas included. 

//** the newline character(s) to be used when generating an email message. 

  define("EmailNewLine", "\r\n"); 

//** the unique X-Mailer identifier for emails sent with this tool. 

  define("EmailXMailer", "PHP-EMAIL,v1.1 (William Fowler)"); 

//** the default charset values for both text and HTML emails. 

  define("DefaultCharset", "iso-8859-1"); 

//**!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
//**EMAIL_MESSAGE_CLASS_DEFINITION******************************************** 
//** The Email class wrappers PHP's mail function into a class capable of 
//** sending attachments and HTML email messages. Custom headers can also be 
//** included as if using the mail function. 

class Email 
{ 
//** (String) the recipiant email address, or comma separated addresses. 

  var $To = null; 

//** (String) the recipiant addresses to receive a copy. Can be a comma
//** separated addresses. 

  var $Cc = null; 

//** (String) the recipiant addresses to receive a hidden copy. Can be a 
//** comma separated addresses. 

  var $Bcc = null; 

//** (String) the email address of the message sender. 

  var $From = null; 

//** (String) the subject of the email message. 

  var $Subject = null; 

//** (String) body content for the message. Must be plain text or HTML based
//** on the 'TextOnly' field. This field is ignored if 
//** SetMultipartAlternative() is called with valid content.

  var $Content = null;

//** an array of EmailAttachment instances to be sent with this message. 

  var $Attachments; 

//** any custom header information that must be used when sending email. 

  var $Headers = null; 

//** whether email to be sent is a text email or a HTML email. 

  var $TextOnly = true; 

//** the charset of the email to be sent (initially none, let type decide). 

  var $Charset = null; 

//** Create a new email message with the parameters provided. 

  function Email($to=null, $from=null, $subject=null, $headers=null) 
  { 
    $this->To = $to; 
    $this->From = $from; 
    $this->Subject = $subject; 
    $this->Headers = $headers;   

//** create an empty array for attachments. NULL out attachments used for
//** multipart/alternative messages initially.
   
    $this->Attachments = Array();    
    $this->Attachments["text"] = null;
    $this->Attachments["html"] = null;
  } 
//** Returns: Boolean
//** Set this email message to contain both text and HTML content.
//** If successful all attachments and content are ignored.

  function SetMultipartAlternative($text=null, $html=null)
  {
//** non-empty content for the text and HTML version is required.

    if(strlen(trim(strval($html))) == 0 || strlen(trim(strval($text))) == 0)
      return false;
    else
    {
//** create the text email attachment based on the text given and the standard
//** plain text MIME type.

      $this->Attachments["text"] = new EmailAttachment(null, "text/plain");
      $this->Attachments["text"]->LiteralContent = strval($text);

//** create the html email attachment based on the HTML given and the standard
//** html text MIME type.

      $this->Attachments["html"] = new EmailAttachment(null, "text/html");
      $this->Attachments["html"]->LiteralContent = strval($html);

      return true;  //** operation was successful.
    }
  }
//** Returns: Boolean 
//** Create a new file attachment for the file (and optionally MIME type) 
//** given. If the file cannot be located no attachment is created and 
//** FALSE is returned. 

  function Attach($pathtofile, $mimetype=null) 
  { 
//** create the appropriate email attachment. If the attachment does not 
//** exist the attachment is not created and FALSE is returned. 

    $attachment = new EmailAttachment($pathtofile, $mimetype); 
    if(!$attachment->Exists()) 
      return false; 
    else 
    { 
      $this->Attachments[] = $attachment;  //** add the attachment to list. 
      return true;                         //** attachment successfully added. 
    } 
  } 
//** Returns: Boolean 
//** Determine whether or not the email message is ready to be sent. A TO and 
//** FROM address are required. 

  function IsComplete() 
  { 
    return (strlen(trim($this->To)) > 0 && strlen(trim($this->From)) > 0); 
  } 
//** Returns: Boolean 
//** Attempt to send the email message. Attach all files that are currently 
//** valid. Send the appropriate text/html message. If not complete FALSE is 
//** returned and no message is sent. 

  function Send() 
  { 
    if(!$this->IsComplete())  //** message is not ready to send. 
      return false;           //** no message will be sent. 

//** generate a unique boundry identifier to separate attachments. 

    $theboundary = "-----" . md5(uniqid("EMAIL")); 

//** the from email address and the current date of sending. 

    $headers = "Date: " . date("r", time()) . EmailNewLine .
               "From: $this->From" . EmailNewLine;

//** if a non-empty CC field is provided add it to the headers here.

    if(strlen(trim(strval($this->Cc))) > 0)
      $headers .= "CC: $this->Cc" . EmailNewLine;
    
//** if a non-empty BCC field is provided add it to the headers here.

    if(strlen(trim(strval($this->Bcc))) > 0)
      $headers .= "BCC: $this->Bcc" . EmailNewLine;

//** add the custom headers here, before important headers so that none are 
//** overwritten by custom values. 

    if($this->Headers != null && strlen(trim($this->Headers)) > 0) 
      $headers .= $this->Headers . EmailNewLine; 

//** determine whether or not this email is mixed HTML and text or both.

    $isMultipartAlternative = ($this->Attachments["text"] != null &&
                               $this->Attachments["html"] != null);

//** determine the correct MIME type for this message.

    $baseContentType = "multipart/" . ($isMultipartAlternative ? 
                                       "alternative" : "mixed");

//** add the custom headers, the MIME encoding version and MIME typr for the 
//** email message, the boundry for attachments, the error message if MIME is 
//** not suppported. 

    $headers .= "X-Mailer: " . EmailXMailer . EmailNewLine . 
                "MIME-Version: 1.0" . EmailNewLine . 
                "Content-Type: $baseContentType; " .
                "boundary=\"$theboundary\"" . EmailNewLine . EmailNewLine; 

//** if a multipart message add the text and html versions of the content.

    if($isMultipartAlternative)
    {
//** add the text and html versions of the email content.

      $thebody = "--$theboundary" . EmailNewLine . 
                  $this->Attachments["text"]->ToHeader() . EmailNewLine .
                 "--$theboundary" . EmailNewLine . 
                  $this->Attachments["html"]->ToHeader() . EmailNewLine; 
    }
//** if either only html or text email add the content to the email body.

    else
    {
//** determine the proper encoding type and charset for the message body. 

      $theemailtype = "text/" . ($this->TextOnly ? "plain" : "html"); 
      if($this->Charset == null) 
        $this->Charset = DefaultCharset;

//** add the encoding header information for the body to the content. 

      $thebody = "--$theboundary" . EmailNewLine . 
                 "Content-Type: $theemailtype; charset=$this->Charset" . 
                  EmailNewLine . "Content-Transfer-Encoding: 8bit" . 
                  EmailNewLine . EmailNewLine . $this->Content . 
                  EmailNewLine . EmailNewLine; 

//** loop over the attachments for this email message and attach the files 
//** to the email message body. Only if not multipart alternative.

      foreach($this->Attachments as $attachment) 
      { 
 //** check for NULL attachments used by multipart alternative emails. Do not
 //** attach these.

        if($attachment != null)
        {
          $thebody .= "--$theboundary" . EmailNewLine . 
                       $attachment->ToHeader() . EmailNewLine; 
        }
      } 
    }
//** end boundry marker is required.

    $thebody .= "--$theboundary--"; 

//** attempt to send the email message. Return the operation success. 

    return mail($this->To, $this->Subject, $thebody, $headers); 
  } 
} 
//******************************************END_EMAIL_MESSAGE_CLASS_DEFINITION 
//**!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 

//**!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
//**EMAIL_ATTACHMENT_CLASS_DEFINITION***************************************** 
//** The EmailAttachment class links a file in the file system to the 
//** appropriate header to be included in an email message. if the file does 
//** not exist the attachment will not be sent in any email messages. It can
//** also be used to generate an attachment from literal content provided.

class EmailAttachment 
{ 
//** (String) the full path to the file to be attached. 

  var $FilePath = null; 

//** (String) the MIME type for the file data of this attachment. 

  var $ContentType = null; 

//** binary content to be used instead the contents of a file.

  var $LiteralContent = null;

//** Creates a new email attachment ffrom the file path given. If no content 
//** type is given the default 'application/octet-stream' is used. 

  function EmailAttachment($pathtofile=null, $mimetype=null) 
  { 
//** if no MIME type is provided use the default value specifying binary data. 
//** Otherwise use the MIME type provided. 

    if($mimetype == null || strlen(trim($mimetype)) == 0) 
      $this->ContentType = "application/octet-stream"; 
    else 
      $this->ContentType = $mimetype; 

    $this->FilePath = $pathtofile;  //** save the path to the file attachment. 
  } 
//** Returns: Boolean
//** Determine whether literal content is provided and should be used as the
//** attachment rather than a file.

  function HasLiteralContent()
  {
    return (strlen(strval($this->LiteralContent)) > 0);
  }
//** Returns: String 
//** Get the binary string data to be used as this attachment. If literal
//** content is provided is is used, otherwise the contents of the file path
//** for this attachment is used. If no content is available NULL is returned.

  function GetContent()
  {
//** non-empty literal content is available. Use that as the attachment.
//** Assume the user has used correct MIME type.

    if($this->HasLiteralContent())
      return $this->LiteralContent;

//** no literal content available. Try to get file data.

    else
    {
      if(!$this->Exists())  //** file does not exist.
        return null;        //** no content is available.
      else
      {
//** open the file attachment in binary mode and read the contents. 

        $thefile = fopen($this->FilePath, "rb"); 
        $data = fread($thefile, filesize($this->FilePath));
        fclose($thefile);
        return $data; 
      }
    }
  }
//** Returns: Boolean 
//** Determine whether or not the email attachment has a valid, existing file 
//** associated with it. 

  function Exists() 
  { 
    if($this->FilePath == null || strlen(trim($this->FilePath)) == 0) 
      return false; 
    else 
      return file_exists($this->FilePath); 
  } 
//** Returns: String 
//** Generate the appropriate header string for this email attachment. If the 
//** the attachment content does not exist NULL is returned. 

  function ToHeader() 
  { 
    $attachmentData = $this->GetContent();  //** get content for the header.
    if($attachmentData == null)             //** no valid attachment content.
      return null;                          //** no header can be generted. 

//** add the content type and file name of the attachment. 

    $header = "Content-Type: $this->ContentType;"; 

//** if an attachment then add the appropriate disposition and file name(s).
  
    if(!$this->HasLiteralContent())
    {
      $header .= " name=\"" . basename($this->FilePath) . "\"" . EmailNewLine .
                 "Content-Disposition: attachment; filename=\"" . 
                  basename($this->FilePath) . "\""; 
    }
    $header .= EmailNewLine;

//** add the key for the content encoding of the attachment body to follow. 

    $header .= "Content-Transfer-Encoding: base64" . EmailNewLine . 
                EmailNewLine; 

//** add the attachment data to the header. encode the binary data in BASE64 
//** and break the encoded data into the appropriate chunks. 

    $header .= chunk_split(base64_encode($attachmentData), 76, EmailNewLine) .
               EmailNewLine; 

    return $header;  //** return the headers generated by file. 
  } 
} 
//***************************************END_EMAIL_ATTACHMENT_CLASS_DEFINITION 
//**!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
?>