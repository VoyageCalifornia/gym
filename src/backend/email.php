<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth   = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host       = $_SERVER['HTTP_PHP_MAILER_HOST'];
$mail->Username   = $_SERVER['HTTP_PHP_MAILER_USERNAME'];
$mail->Password   = $_SERVER['HTTP_PHP_MAILER_PASSWORD'];
$mail->Port       = $_SERVER['HTTP_PHP_MAILER_PORT'];

$contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

if($contentType == 'application/json') {
    $content = trim(file_get_contents('php://input'));

    $decoded = json_decode($content, true);

    if(is_array($decoded)) {
        foreach($decoded as $name => $value) {
            $decoded[$name] = trim(filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        }

        $requiredFields = ['name', 'phone', 'to'];
        foreach ($requiredFields as $field) {
            if (empty($decoded[$field])) {
                exit(json_encode(['success' => false, 'message' => "$field is required"]));
            }
        }

        try {
            $message = nl2br(htmlspecialchars($decoded['message']));

            $mail->setFrom('dumusedpoker@gmail.com');
            $mail->Subject = $decoded['subject'];
            $mail->isHTML(true);
            $mail->Body = <<<HTML
                <p><b>Name:</b> {$decoded['name']}</p>
                <p><b>Phone:</b> {$decoded['phone']}</p>
                <p><b>Message:</b> {$message}</p>
            HTML;
            $mail->addAddress($decoded['to']);
    
            $mail->send();
    
            exit(json_encode(array_merge(['success' => true], $decoded)));
        } catch (Exception $e) {
            exit(json_encode(array_merge(['success' => false], ['message' => $e->getMessage()])));
        }
    }
}