<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
	header("HTTP/1.0 404 Not Found");
	return;
}
header("Content-Type: text/html; charset=UTF-8");

//ini_set( 'display_errors', 1 );

$name      = htmlspecialchars($_POST["name_"]);
$email     = htmlspecialchars($_POST["email_"]);
$phone     = htmlspecialchars($_POST["phone_"]);
$comments  = htmlspecialchars($_POST["comments_"]);
$lang      = htmlspecialchars($_POST["lang_"]);
$url       = htmlspecialchars($_POST["url_"]);

$dns       = 'http://59.106.171.47/www/virtualoffice/osaka/';
$datetime  = date("Y-m-d H:i:s T e");
$agentname = '';

/*
 * Settings section
 */
define('COUNTRY_NAME', 'Japan');
define('COUNTRY_CODE', 'JP');
define('CSV_SEPARATOR', ';');

define('SOAP_URL', 'https://services.splatform.net/EnquiryNotification/V3/EnquiryNotificationService.svc?wsdl');
define('SOAP_LOGIN', 'splatform\spidesignenquiryuser');
define('SOAP_PASSWORD', 'D3sign123');

define('DEBUG', '0');

/*
 * Retrieve params
 */
function map_params() {
	global $name, $email, $phone, $comments, $lang, $url;
  $params = array(
    'Topic'                => $name,
    'LastName'             => $name,
    'Email'                => $email,
    'Phone'                => $phone,
    'Comments'             => $comments,
    'ServcorpCountry'      => COUNTRY_NAME,
    'ServcorpLocation'     => '',
    'ServcorpLocationCode' => '',
    'SourceWebsite'        => $url,
    'EnquiryChannel'       => 'WebSite',
    'EnquirySource'        => 'InternetWebSearch',
    'Salutation'           => '',
    'InterestEnquiryType'  => 'Virtual',
    'PreferredLanguage'    => $lang,
    'AgentName'            => $agentname,
  );

  return $params;
}

/*
 * Submit form section
 */
// Get params to send SOAP
$params = map_params();

try {
	// Send SOAP
	if (defined('SOAP_LOGIN') && SOAP_LOGIN) {
		$client = new SoapClient(SOAP_URL, array(
			'login' => SOAP_LOGIN,
			'password' => SOAP_PASSWORD
		));
	}
	else {
		$client = new SoapClient(SOAP_URL);
	}

	if (DEBUG) {
		// ---- DEBUG ---
		$error_message = '<pre>'. var_export($params, TRUE) .'</pre>';
	}
	else {
		$response = $client->Notify(array('enquiry' => $params));
	}
}
catch (Exception $e) {
		// Show template with error message.
		$error_message = $e->getMessage();
}

/*
 * Submit mail section
 */
$to        = "WebFormEnquiryReciepts@Servcorp.co.jp";
$args      = "-fservcorp.japan.alert@gmail.com";
$subject   = "Email enquiry from virtualoffice.servcorp.co.jp/osaka";
$from      = "noreply@servcorp.co.jp";
$semi_rand = md5(time());
$mailhead  = "From:". $from . "\r\n" .
		"MIME-Version: 1.0\n" .
		"Content-Type: text/html; charset=\"utf-8\"";
$emessage = "<font face=Verdana>\n\r" .
"<table width='500' cellpadding=1>\n\r" .
"<tr><td width='100' bgcolor='#071F3D'><B><font color='#FFFFFF' style='font-size: 9pt;'> &nbsp; </font></b></td><td width='400' bgcolor='#071F3D'><font color='#FFFFFF' style='font-size: 9pt;'><B>Enquiry</b></font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>Full name:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . $name . "</font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>Email:</font></b></td><td width='400'><font style='font-size: 9pt;'><a href='mailto:" . $email . "' style='color: #0095D3; text-decoration: none;'>" . $email . "</a></font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>Phone:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . $phone . "</font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>Comments:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . $comments . "</font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>DNS:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . $dns . "</font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>SOAP:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . SOAP_URL . "</font></td></tr>\n\r" .
"<tr><td width='100'><B><font style='font-size: 9pt;'>Date time:</font></b></td><td width='400'><font style='font-size: 9pt;'>" . $datetime . "</font></td></tr>\n\r" .
"</table>\n\r";
if($error_message) {
	$emessage .= "<br><p style='font-size:9pt; color: #ff0000;'><strong>SOAP request cannot be sent due to the error below:</strong><br><br /><span style='font-size: 9pt;'>" . $error_message . "</span></p>\n\r";
}

$mail_sent = @mail( $to, $subject, $emessage, $mailhead, $args );
if ($mail_sent == TRUE) {
	echo "done";
} else {
	echo "error";
}
?>
