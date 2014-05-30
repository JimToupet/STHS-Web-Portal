<?php
/*
** Title: Shortening URL Class
** Author: chazzuka <ariel@chazzuka.com>
** Author URL: http://www.chazzuka.com
** Latest Updated: September 24 2009
*/
class ShortUrl {

	public static function create($url,$provider='tinyurl',$user='',$key='') {
		$api_url = sprintf(self::api($provider),urlencode($url),$user,$key);
		return self::inspect($provider,self::execute($api_url));
	}

	private static function execute($url) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$text = curl_exec($ch);
		curl_close($ch);
		return $text;
	}

	private static function inspect($provider,$xml) {
		if(!empty($xml)) {
			switch(strtolower(trim($provider))){
				case "bitly":
					$o = new SimpleXMLElement($xml);
					return (string)$o->results->nodeKeyVal->shortUrl;
					break;
				case "trim":
					$o = new SimpleXMLElement($xml);
					return (string)$o->url;
					break;
				case "isgd":
				case "hexio":
				default:
					return $xml;
			}
		}
		return false;
	}

	private static function api($provider) {
		switch(strtolower(trim($provider))){
			case "bitly":
				$return = "http://api.bit.ly/shorten?version=2.0.1&format=xml&longUrl=%s&login=%s&apiKey=%s";
				break;
			case "isgd":
				$return = "http://is.gd/api.php?longurl=%s";
				break;
			case "hexio":
				$return = "http://hex.io/api-create.php?url=%s";
				break;
			case "digg":
				$return = "http://services.digg.com/url/short/create?url=%s&appkey=%s&type=xml";
				break;
			case "trim":
				$return = "http://api.tr.im/v1/trim_url.xml?url=%s";
				break;
			default:
				$return = "http://tinyurl.com/api-create.php?url=%s";
		}
		return $return;
	}
}
?>