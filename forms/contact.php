<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email configuration
    $to = "owiroadams@gmail.com"; // Your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Email body
    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Subject: $subject\n\n" .
            "Message:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // You can use this response to show a success message
    } else {
        echo "error"; // Handle error scenarios appropriately
    }
} else {
    echo "Invalid request method.";
}
?>
