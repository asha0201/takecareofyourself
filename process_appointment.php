<?php
// Allow Cross-Origin Requests (CORS)
header("Access-Control-Allow-Origin: *"); // Change '*' to your domain for security
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(200);
    exit();
}

// Process POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $services = isset($_POST['services']) ? trim($_POST['services']) : '';
    $date = isset($_POST['date']) ? trim($_POST['date']) : '';

    // Validate required fields
    if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($services) || empty($date)) {
        echo "All fields are required.";
        exit();
    }

    // Set recipient email
    $to = "youmatter@takecareofyourself.in"; // Change to your actual email
    $subject = "New Appointment Booking";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email message
    $message = "New Appointment Details:\n\n";
    $message .= "First Name: $fname\n";
    $message .= "Last Name: $lname\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Service: $services\n";
    $message .= "Preferred Date: $date\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Appointment request sent successfully!";
    } else {
        echo "Error sending appointment request.";
    }
} else {
    echo "Invalid request.";
}
?>
