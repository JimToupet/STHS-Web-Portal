<?
//** load email class definition.

  include('class.Email.php');  

//** establish to,from, and any other recipiants.

  $Sender = "you@there.com";
  $Recipiant = "me@here.com";
  $Cc = "them@there.com";
  $Bcc = "";

//** create the text and HTML versions of the body content here.

  $textVersion = "Hello World!";
  $htmlVersion = "<font face='verdana' color='blue'><b>Hello World</b></font>";

  unset($msg);

//** !!!! SEND A PLAIN TEXT EMAIL !!!!
//** create the new message using the to, from, and email subject.

  $msg = new Email($Recipiant, $Sender, "A Test Plain Text Email!"); 
  $msg->Cc = $Cc;
  $msg->Bcc = $Bcc;

//** set the message to be text only and set the email content.

  $msg->TextOnly = true;
  $msg->Content = $textVersion;
  
//** send the email message.

  $SendSuccess = $msg->Send();
  
  echo "Plain text email was ", 
       ($SendSuccess ? "sent" : "not sent"), "<br>";

  unset($msg);

//** !!!! SEND AN HTML EMAIL w/ATTACHMENT !!!!
//** create the new message using the to, from, and email subject.

  $msg = new Email($Recipiant, $Sender, "A Test HTML Email!"); 
  $msg->Cc = $Cc;
  $msg->Bcc = $Bcc;

//** set the message to be text only and set the email content.

  $msg->TextOnly = false;
  $msg->Content = $htmlVersion;
  
//** attach this scipt itself to the message.

  $msg->Attach(__FILE__, "text/plain");

//** send the email message.

  $SendSuccess = $msg->Send();
  
  echo "HTML email w/attachment was ", 
       ($SendSuccess ? "sent" : "not sent"), "<br>";

  unset($msg);

//** !!!! SEND A MULTIPART/ALTERNATIVE EMAIL !!!!
//** create the new message using the to, from, and email subject.

  $msg = new Email($Recipiant, $Sender, "A Test Multipart Alternative Email!"); 
  $msg->Cc = $Cc;
  $msg->Bcc = $Bcc;

//** set the message to be a multiprat/alternative email. This allows for
//** multiple versions of same content.
//** NOTE: you cannot send attachments when a message is set to be
//**       multipart/alternative. there is also no way to switch
//**       back to normal multipart/mixed after this call.

  $msg->SetMultipartAlternative($textVersion, $htmlVersion);
  
//** send the email message.

  $SendSuccess = $msg->Send();
  
  echo "Multipart/alternative email was ", 
       ($SendSuccess ? "sent" : "not sent"), "<br>";

?>
