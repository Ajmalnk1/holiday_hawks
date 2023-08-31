<?php
error_reporting(0);
//
// SendGrid PHP Library Example
//
// This example shows how to send email through SendGrid
// using the SendGrid PHP Library.  For more information
// on the SendGrid PHP Library, visit:
//
//     https://github.com/sendgrid/sendgrid-php
//

require 'vendor/autoload.php';


/* USER CREDENTIALS
/  Fill in the variables below with your SendGrid
/  username and password.
====================================================*/
$sg_username = "rekhas";
$sg_password = "rekhacarillon123";


/* CREATE THE SENDGRID MAIL OBJECT
====================================================*/
$sendgrid = new SendGrid( $sg_username, $sg_password );
$mail = new SendGrid\Email();



/* ADD THE ATTACHMENT
/  For the purposes of this demo, the file being
/  attached resides in the same folder as this
/  example.php file
====================================================*/
$mail->
addAttachment( dirname( __FILE__ )."/sendgrid_logo.jpg" );




/* SEND MAIL
/  Replace the the address(es) in the setTo/setTos
/  function with the address(es) you're sending to.
====================================================*/
try {
   /* $mail->
    setFrom( "support@spajunction.com" )->
    setTos( array("rekha@carillonmedia.com","rekhasebi@gmail.com") )->
    setSubject( "Testing Sendgrid" )->
    setText( "Hello,\n\nThis is a test message from SendGrid.    We have sent this to you because you requested a test message be sent from your account.\n\nThis is a link to google.com: http://www.google.com\nThis is a link to apple.com: http://www.apple.com\nThis is a link to sendgrid.com: http://www.sendgrid.com\n\nThank you for reading this test message.\n\nLove,\nYour friends at SendGrid" )->
    setHtml( "<table style=\"border: solid 1px #000; background-color: #666; font-family: verdana, tahoma, sans-serif; color: #fff;\"> <tr> <td> <h2>Hello,</h2> <p>This is a test message from SendGrid.    We have sent this to you because you requested a test message be sent from your account.</p> <a href=\"http://www.google.com\" target=\"_blank\">This is a link to google.com</a> <p> <a href=\"http://www.apple.com\" target=\"_blank\">This is a link to apple.com</a> <p> <a href=\"http://www.sendgrid.com\" target=\"_blank\">This is a link to sendgrid.com</a> </p> <p>Thank you for reading this test message.</p> Love,<br/> Your friends at SendGrid</p> <p>  </td> </tr> </table>" );
    
    $response = $sendgrid->send( $mail );*/
	
	
	// Start Sendgrid
            $sendgrid = new SendGrid('rekhas', 'rekhacarillon123');
            $header = new Smtpapi\Header();
            /*$filter = array(
              'templates' => array(
                'settings' => array(
                  'enabled' => 1,
                  'template_id' => '3b06364d-0c4f-4190-adf4-eeabe3031338'
                )
              )
            );*/
			
			
            $header->setFilters($filter);
            $emailwelcome    = new SendGrid\Email();
            $emailwelcome->addTo($email)->
                   setFrom('support@spajunction.com')->
				   setTos(array('rekhasebi@gmail.com'))->
                   setFromName('Spa Junction Team')->
                   setSubject('Your Invitation')->
                   setText('Hello World!')->
                   setHtml('<strong>Hello World!</strong>');
           $response= $sendgrid->send($emailwelcome);
	
	
	
	
	

    if (!$response) {
        throw new Exception("Did not receive response.");
    } else if ($response->message && $response->message == "error") {
        throw new Exception("Received error: ".join(", ", $response->errors));
    } else {
        //print_r($response);
		echo 'Mail Sent';
    }
} 
catch ( Exception $e ) {
    var_export($e);
}


?>
