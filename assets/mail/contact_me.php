<?php
// Check for empty fields

if(empty($_REQUEST['name'])      ||
   empty($_REQUEST['email'])     ||
   empty($_REQUEST['message'])   ||
   !filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_REQUEST['name']));
$email_address = strip_tags(htmlspecialchars($_REQUEST['email']));
$message = strip_tags(htmlspecialchars($_REQUEST['message']));

// Create the email and send the message
$to = 'arunpandian.murugan@outlook.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Portfolio Website Contact Form:  $name";
$email_body  = "You have received a new message from your website contact form.\n\nHere are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$email_body = wordwrap($email_body, 70);


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text;charset=UTF-8" . "\r\n";
$headers .= "From: <noreply@arunpandian.info>" . "\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";

echo $email_body;
//Use this when hosted in official site
mail($to,$email_subject,$email_body,$headers);


//Use this when hosted in github site
//date_default_timezone_set('India/Chennai');
//$date = date("Y/m/d H:i:s");
//$data = $date . "," . $name . "," . $email_address . "," . $phone . "," . $message;
//$file = "mail.csv";
//file_put_contents($file, $data . PHP_EOL, FILE_APPEND);

return true;
?>
