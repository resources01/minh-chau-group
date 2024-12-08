<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "youremail@mail.com" );


// Read the form values
$success = false;
$userName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderSubject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Message:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $senderSubject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $senderEmail . ">";
  $msgBody = " Subject: " . $senderSubject . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: lien-he-01.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>