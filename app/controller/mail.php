<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';
    class mailer  {
     
        public function mailorder($mailorder,$content){
            $mail = new PHPMailer(true);
          
           
            try {
               

              
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'linhb1910247@student.ctu.edu.vn';                     //SMTP username
                $mail->Password   = 'oeqbnywqcvverwyr';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                // PHPMailer::ENCRYPTION_SMTPS
                //Recipients
                $mail->setFrom('linhb1910247@student.ctu.edu.vn', 'Mailer');
                $mail->addAddress($mailorder, 'Joe User');     //Add a recipient
                $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Order yours';
                $mail->Body    = $content;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
               
        
                    $message['msg']="Message has been sent!!";
                    header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
                
           
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
        }
       
      
    }
 
?>