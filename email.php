<?php 
$name = $_GET['name'];
$mail = $_GET['mail'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$citynstate = $_GET['citynstate'];
$country = $_GET['country'];
$message = $_GET['message'];

$content = "<!DOCTYPE html> ";
$content .= "<html> ";
$content .= "<head> ";
$content .= "<title>Contacting</title> ";	
$content .= "</head> ";
$content .= "<body style='overflow: hidden;'> ";
$content .= "<p>".$message."</p><br><br> ";
$content .= "<p> ";
$content .= "<b>Regards<br>".$name."<br>".$mail."<br>".$phone."<br>".$address."<br>".$citynstate.", ".$country."</b> ";
$content .= "</p> ";
$content .= "</body> ";
$content .= "</html>";

// registration bill html ends

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;
 
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                       
$mail->SMTPAuth = true;                               
$mail->Username = 'icnn2018website@gmail.com';                   
$mail->Password = '25nov1992';               
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                                    
$mail->setFrom('icnn2018website@gmail.com', 'ICNN2018 Website');
$mail->addAddress("vit5icnn2018@gmail.com");       
$mail->WordWrap = 50; 
$mail->isHTML(true);                                  
 
$mail->Subject = 'Email from the ICNN 2018 website';
$mail->Body    = $content;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
} else {
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit; 
	}
	redirect_to("index.html");
} 

?>