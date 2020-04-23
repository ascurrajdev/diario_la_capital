<?php
namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class MailService {
    public function sendEmail(){
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->SMTPAuth =true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
            $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
            $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
            $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
            $mail->setFrom("joseascurra123@gmail.com", "Jose Ascurra"); 
            $mail->Subject = "Prueba de tareas programadas en laravel";
            $mail->MsgHTML("Hola a todos, y gracias por haberse suscrito a nuestro newsletter");
            $mail->addAddress("jose2001ascurra@gmail.com" , "Ivan Ascurra"); 
            $mail->send();
        }catch(Exception $e){
            return $e;
        }
        if($mail){
            return "Correo enviado";
        }else{
            return "Correo no enviado";
        }
    }
}