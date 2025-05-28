<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['contact_name']) && !empty($_POST['contact_email']) && !empty($_POST['contact_text'])) {
        // Sanitize user input
        $contact_name = htmlspecialchars($_POST['contact_name']);
        $contact_email = htmlspecialchars($_POST['contact_email']);
        $contact_text = htmlspecialchars($_POST['contact_text']);

        // Email details
        $to = "zimbaisaac484@gmail.com";
        $subject = "New Contact Form Submission";
        $message = "Name: $contact_name\n";
        $message .= "Email: $contact_email\n\n";
        $message .= "Message:\n$contact_text";

        $headers = "From: $contact_email";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "<p style='color: green;'>Message sent successfully!</p>";
        } else {
            echo "<p style='color: red;'>Failed to send message. Please try again later.</p>";
        }
    } else {
        echo "<p style='color: red;'>All fields are required.</p>";
    }
}
?>

<!-- Contact Form -->
<form action="index.php" method="POST">
    <label>Name:</label>
    <input type="text" name="contact_name" required><br><br>

    <label>Email address:</label>
    <input type="email" name="contact_email" required><br><br>

    <label>Message:</label>
    <textarea name="contact_text" rows="8" cols="30" required></textarea><br><br>

    <center>
        <input type="submit" value="Send" style="height: 30px; border-radius: 20px; background-color: coral;">
    </center>
</form>