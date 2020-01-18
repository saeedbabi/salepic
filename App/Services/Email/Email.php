<?php

namespace App\Services\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    public $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }


    public function setMail()
    {
        return (object) config('email');
    }


    public function setMailBody($text)
    {
        return '
    <div style="direction: rtl; font-family: tahoma; border: 1px solid #0619ff; padding: 8px; border-radius: 5px;width:50%;margin-left:25%">
    <h3>رمز عبور جدید شما :</h3>
    <h1 style="text-align:center">
    ' . $text . '
    </h1>
    </div>
    ';
    }



    public function sendMail($mail, $message, $subject)
    {
        $mail_config = $this->setMail();

        try {
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Username = 'salepicteam@gmail.com';
            $this->mail->Password = 'mehrak1193';
            $this->mail->Port = 587;
            $this->mail->CharSet = "UTF-8";
            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            // dd($this->mail->Password);
            $this->mail->setFrom('salepicteam@gmail.com', 'SalePicTeam');
            $this->mail->addAddress($mail);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $this->setMailBody($message);
            $this->mail->send();
            echo 'Email Sent';
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
