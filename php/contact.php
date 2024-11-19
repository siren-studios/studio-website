<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sirenstudiosmanila@gmail.com"; // Replace with your email
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        echo "Invalid email format. Please try again.";
    } else {
        $email_subject = "Contact Form Submission: $subject";
        $email_body = "You have received a new message from $email:\n$message";

        if (mail($to, $email_subject, $email_body)) {
            // Successful submission, display pop-up
            echo "<script>alert('Your submission has been received. Thank you!');</script>";
            // Redirect to contact.html
            echo "<script>window.location.href = '../contact.html';</script>";
        } else {
            // Error in sending email
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>