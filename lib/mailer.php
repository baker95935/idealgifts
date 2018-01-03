<?php

/**
 * Description of mailer
 * @author baker95935
 * @datetime 2018-1-12  14:53:37
 * @version 1.0
 */
class Mailer { //class start

    public function sendEmail($targetEmail,$username)
    {
		date_default_timezone_set('Etc/UTC');
		
		require 'phpmailer/PHPMailerAutoload.php';
		
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = "smtp.163.com";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 25;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = "13146794571@163.com";
		//Password to use for SMTP authentication
		$mail->Password = "Baker95930";
		//Set who the message is to be sent from
		$mail->setFrom('13146794571@163.com', 'admin');
		//Set an alternative reply-to address
		$mail->addReplyTo('13146794571@163.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($targetEmail, $username);
		//Set the subject line
		$mail->Subject = 'PHPMailer SMTP test';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML("<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
  							<h1>hi".$username.",welcome visit idealgiftscn.</h1>
						</div>");
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		$mail->addAttachment('images/phpmailer_mini.png');
		
		//send the message, check for errors
		if (!$mail->send()) {
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		    return '2';
		} else {
		    return "1";
		}
		    	
    }
}

// class end
?>
