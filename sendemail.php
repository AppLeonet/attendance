<?php 
    require 'vendor/autoload.php';

    class SendEmail {
        public static function SendMail($to,$subject,$content) {
            //$key = 'API Key removed for secure GitHub push';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("hozhengmandeng@gmail.com", "Leo Ho");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);
            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            } catch(Exception $e) {
                echo 'Email exception Caught : '.$e->getMessage() ."\n";
                return false;
            }
        }
    }
?>