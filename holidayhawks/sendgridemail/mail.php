<?php
include("config.php");
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
$sg_username = "rekha@carillonmedia.com";
$sg_password = "rekha123";


/* CREATE THE SENDGRID MAIL OBJECT
====================================================*/
$sendgrid = new SendGrid( $sg_username, $sg_password );
//$sendgrid = new SendGrid('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');
$mail = new SendGrid\Email();


//$ar=array("rekha@carillonmedia.com","rekhasebi@gmail.com");

/* SEND MAIL
/  Replace the the address(es) in the setTo/setTos
/  function with the address(es) you're sending to.
====================================================*/

//$s=mysql_query("select email from spa_users where id=3417");
$s=mysql_query("SELECT * FROM `spa_users` WHERE `email` LIKE '%rekha%'");



while($r=mysql_fetch_array($s)){

//try {
    $mail->
    setFrom( "support@spajunction.com" )->
	//foreach($ar as $ar_val){
	
    addTo( "".$r['email']."" )->
	//addTo( "rekha@carillonmedia.com" )->
	
	//}
	
	
	
    setSubject( "This Is The Subject" )->
   // setText( "Hello,\n\nThis is a test message from SendGrid.    We have sent this to you because you requested a test message be sent from your account.\n\nThis is a link to google.com: http://www.google.com\nThis is a link to apple.com: http://www.apple.com\nThis is a link to sendgrid.com: http://www.sendgrid.com\n\nThank you for reading this test message.\n\nLove,\nYour friends at SendGrid" )->
    setHtml( "<table style=\"border: solid 1px #000; background-color: #666; font-family: verdana, tahoma, sans-serif; color: #fff;\"> <tr> <td> <h2>Hello,</h2> <p>This is a test message from Spa jucntion.    We have sent this to you because you requested a test message be sent from your account.</p>  <p>Thank you for reading this test message.</p> Love,<br/> Your friends at Spa junction</p> <p> <img src=\"http://spajunction.com/assets/img/common/logo.png\" alt=\"Spa Junction!\" /> </td> </tr> </table>" );
    
    $response = $sendgrid->send( $mail );

    if (!$response) {
        throw new Exception("Did not receive response.");
    } else if ($response->message && $response->message == "error") {
        throw new Exception("Received error: ".join(", ", $response->errors));
    } else {
        $msg='Success';
    }
} 

if($msg)
{
echo $msg;
}
//}



/*catch ( Exception $e ) {
    var_export($e);
}*/


?>
