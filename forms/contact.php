<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // SMTP Configuration
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.truehost.cloud'; // Truehost SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'owiroadams@gmail.com'; // Your Truehost email
        $mail->Password = 'Neuman87$'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Headers
        $mail->setFrom($email, $name);
        $mail->addAddress('owiroadams@gmail.com'); // Your receiving email
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send Email
        if ($mail->send()) {
            echo "success";
        } else {
            echo "error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
} else {
    echo "Invalid request method.";
}
?>
