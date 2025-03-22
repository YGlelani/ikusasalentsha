
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $contact_number = htmlspecialchars($_POST["contact_number"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "admin@ikusasalentsha.org";
    $subject = "New Message from Website Contact Form";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "You have received a new message:\n\n";
    $body .= "Name: $first_name $last_name\n";
    $body .= "Email: $email\n";
    $body .= "Contact Number: $contact_number\n\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again.'); window.history.back();</script>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
\end{code}