<?php

namespace app\model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php';

class Email extends PHPMailer {

    private CONST SMTP_DEBUG_MAIL = SMTP::DEBUG_CLIENT;
    private CONST HOST_MAIL = 'mail.2ucase.fun';
    private CONST SMTP_AUTH_MAIL = true;
    private CONST USERNAME_MAIL = 'case2ucase@2ucase.fun';
    private CONST PASSWORD_MAIL = 'Davi2706@';
    private CONST SMTP_SECURE_MAIL = PHPMailer::ENCRYPTION_STARTTLS;
    private CONST PORT_MAIL = 587;

    public function contactEmail($email, $nome, $assunto, $telefone, $msg, $numeroP = null, $arquivo = null): bool {

        try {
            //Server settings
            $this->SMTPDebug = self::SMTP_DEBUG_MAIL;            //Enable verbose debug output
            $this->isSMTP();                                     //Send using SMTP
            $this->Host       = self::HOST_MAIL;                 //Set the SMTP server to send through
            $this->SMTPAuth   = self::SMTP_AUTH_MAIL;            //Enable SMTP authentication
            $this->Username   = self::USERNAME_MAIL;             //SMTP username
            $this->Password   = self::PASSWORD_MAIL;             //SMTP password
            $this->SMTPSecure = self::SMTP_SECURE_MAIL;          //Enable implicit TLS encryption
            $this->Port       = self::PORT_MAIL;                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


            //Recipients
            $this->setFrom(self::USERNAME_MAIL, 'Tentativa de Contato');
            $this->addAddress(self::USERNAME_MAIL, 'Joe User');     //Add a recipient
            $this->addReplyTo($email, $nome);

            if (!empty($arquivo)){
                //Attachments
                $this->addAttachment($arquivo, 'Documento');    //Optional name
            }


            //Content
            $this->isHTML(true);                                  //Set email format to HTML
            $this->Subject = $assunto . ' ' . $numeroP;
            $this->Body    = "<h1>Email: $email </h1> <br> <h1>Telefone: $telefone </h1> <br>" . "<p>$msg</p>";
            $this->AltBody = $msg;

            $this->send();
            return true;

        }catch (\Exception $exception){
            echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
            return false;

        }

    }
}