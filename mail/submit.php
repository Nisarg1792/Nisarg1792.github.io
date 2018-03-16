<?php 
if(isset($_POST)){    
  $captcha = $_POST['g-recaptcha-response'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $secretkey = "6Lf7p0UUAAAAAJPs7qgg8Muv33aUcDDEsFUFKRl_";          
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$captcha."&remoteip=".$ip);
  $responseKeys = json_decode($response,true);          
 if($responseKeys['success'] == false){
   echo "You are not a Human. Please Verify Recaptcha";
   exit();
 }

  $name = $_POST['name'] ; 
  $email = $_POST['email'] ;
  $phone = $_POST['phone'] ;
  $message = $_POST['message'] ;
// Create the email and send the message
  
  $to = 'support@portisarg.me' ;  // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
  $subject = "Website Contact Form:  $name";
  $message = "From: $name \nEmail: $email \nPhone: $phone \nMessage: $message \n";
  // The $message variable will form the message of the email.
  
  // A line break ( \n ) is placed between each section
  $sent = mail($to, $subject, $message) ; 
    if($sent) {
      echo "<h3>Thank you for your message.</h3><p>Your email has been sent successfully and we appreciate you getting in touch with us. We will be sending a reply soon.</p>"; 
    }else{
      echo "<h3>Sorry, your message wasn't sent.</h3><p>We seem to have encountered a problem sending your message. Please go back and try again. If you get this message again please email <a href='mailto:webmaster@yourDomain.com'>webmaster@yourDomain.com</a>.</p>"; 
}
  // A new variable called $sent is created
  // This variable uses the mail() function to send the data.
  // The first option is the email address the message is sent to, as declared in the $to variable
  // The second is the subject, as declared with the $subject variable
  // The last is the message, as declared by the $message variable which holds the user submitted data
  // If the message is sent successfully, a "success message" is echoed.
  // If not, an alternate message is echoed.
}
?>
