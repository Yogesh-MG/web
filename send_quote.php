<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $service = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Email details
    $to = 'your_email@example.com'; // Replace with your email address
    $subject = 'New Quote Request';
    $message_content = "Name: $name\n";
    $message_content .= "Email: $email\n";
    $message_content .= "Service: $service\n";
    $message_content .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    // Attempt to send email
    if (mail($to, $subject, $message_content, $headers)) {
        // Email sent successfully
        http_response_code(200); // OK
        echo json_encode(array('message' => 'Email sent successfully'));
    } else {
        // Email sending failed
        http_response_code(500); // Internal Server Error
        echo json_encode(array('error' => 'Failed to send email'));
    }
} else {
    // Handle other request methods or errors
    http_response_code(405); // Method not allowed
    echo json_encode(array('error' => 'Method not allowed'));
}
?>
