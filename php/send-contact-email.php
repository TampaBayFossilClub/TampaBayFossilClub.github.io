<?php
if(isset($_POST['contactForm'])) {

    $email_to = "tampabayfossilclub@gmail.com";
    $email_subject = "Website Contact Message";

    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email_from = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.
    No special characters or numbers are allowed. <br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered is too short.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

  $string_exp2 = "/^[a-zA-Z0-9.- ]+$/";
  if(!preg_match($string_exp2,$message)){
    $error_message .= 'The Message you entered does not appear to be valid.
    No special characters other than . and - are allowed. <br />';
  }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

 echo "Your messages has been sent successfully!";
 header('Location: www.google.com');  //Redirect to new url if form submitted


}
?>
