<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars($_POST["contact"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "admin@ikusasalentsha.org";
    $subject = "New Contact Message from $first_name $last_name";
    $body = "Name: $first_name $last_name\n";
    $body .= "Email: $email\n";
    $body .= "Contact Number: $contact\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
