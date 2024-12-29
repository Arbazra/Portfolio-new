<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'www.arbazrana@gmail.com'; // SMTP username
        $mail->Password = 'dwnx tasr biuk evbf'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('arbazrana@gmail.com'); // Add a recipient

        // Email subject and body
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = "New Contact Form Submission: $subject";
        $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

        // Send the email
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: {$mail->ErrorInfo}";
    }
} else {
    echo "invalid_request";
}
?>
