<?php
if(isset($_POST['email'])) {
     
    $email_to = "awong@andrewwong.tk";
     
    $email_subject = "Website Email!";
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email'])) {
        died('Please ensure you fill out your name and email so I can get back to you!');      
    }
    // from form
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
	$subject = $_POST['subject']; // not required
    $message = $_POST['message']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
	function died($error)
	{
		echo "Sorry. The message could not be sent. There was an error in the form you submitted.";
		echo "The error is as follows: ";
		echo $error;
		die();
	}
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
     
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$mail_status = mail($email_to, $email_subject, $email_message, $headers); 
	
	if($mail_status){
		print "<script> document.location.href='http://andrewwong.tk/success.html'; </script>";
	}
	else { 
		echo "Error! Please try again.";
	}
}
die();
?>