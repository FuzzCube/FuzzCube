<?php
    $msg = "";
    if (isset($_POST['submit'])){
        require 'phpmailer/PHPMailerAutoload.php';

        function sendmail($to, $from, $fromName, $body, $attachment) {
            $mail = new PHPMailer();
            $mail->setForm($from, $formName);
            $mail->addAddress($to);
            $mail->addAttachment($attachment);
            $mail->Subject = 'Contact Form - Email';
            $mail->Body = $body;
            $mail->isHTML(isHtml: false);

            return $mail->send();
        }

        $name = $_POST['username'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        $file = "attachment/" . basename($_FILE['attachment']['name']);
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $file)) {
            if (sendemail(to 'andrejs.sadkovojs@gmail.com', $email, $name, $body, $file))
                $msg = 'Email sent!';
            else 
                $msg = 'Email failed!';
        }   else
                $msg = "Please check your attachment!";
        
    }
?>