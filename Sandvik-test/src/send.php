<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

// другие важные переменные
$sender = 'timon09df@gmail.com';

// настройки кодировок и прочего
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);

// переменные для вывода 
$name = $_POST['name'];
$email = $_POST['email'];

// настройки сервера
$mail->Host       = 'smtp.elasticemail.com';                    
$mail->SMTPAuth   = true;                                   
$mail->Username   = $sender;                     
$mail->Password   = '233973DF64E2EC6882B41B1CC99B132E09A5';                               
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
$mail->Port       = 465;  

// от кого письмо
$mail->setFrom($sender, 'строитель');
// кому отправить
$mail->addAddress('kirur.smtp@gmail.com');

// тема письма
$mail->Subject = 'сайт строителей белого дома';

// тело письма
$body = '<h1>письмо кароче пришло с сайта ебать!</h1>';
$body.= '<p><strong>Имя:</strong> ' . $name . '</p>';
$body.= '<p><strong>Имя:</strong> ' . $email . '</p>';


$mail->Body = $body;

// проверка отправки
if(!$mail->send()) {
  $message = 'error';
} else {
  $message = 'sended';
}

// получаем ответ и возвращаем его
$response = ['message' => $message];

header('Content-type: aplication/json');
echo json_encode($response);

