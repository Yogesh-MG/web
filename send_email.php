<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Assuming 'email' is the name attribute of your input field

    // Replace 'your_email@example.com' with your actual email address
    $to = 'yoge843120@gmail.com';
    $subject = 'New signup';
    $message = 'Email: ' . $email;

    // Simple example of sending email using mail() function
    mail($to, $subject, $message);

    // Optionally, you can send a response back to the client
    $response = array('message' => 'Email sent successfully');
    echo json_encode($response);
} else {
    // Handle other request methods or errors
    http_response_code(405); // Method not allowed
    echo json_encode(array('error' => 'Method not allowed'));
}
?>
