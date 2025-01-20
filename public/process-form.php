<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set headers for security
header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method';
    echo json_encode($response);
    exit;
}

// Verify CSRF token (implement your token validation here)
session_start();
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $response['message'] = 'Invalid security token';
    echo json_encode($response);
    exit;
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Function to validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number (basic validation)
function isValidPhone($phone) {
    return preg_match('/^[0-9\s\-\(\)\+]{7,20}$/', $phone);
}

// Get and sanitize form data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['tel']) ? sanitizeInput($_POST['tel']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validate required fields
if (empty($name)) {
    $response['errors'][] = 'Name is required';
}

if (empty($email)) {
    $response['errors'][] = 'Email is required';
} elseif (!isValidEmail($email)) {
    $response['errors'][] = 'Invalid email format';
}

if (empty($phone)) {
    $response['errors'][] = 'Phone number is required';
} elseif (!isValidPhone($phone)) {
    $response['errors'][] = 'Invalid phone number format';
}

// If there are validation errors, return them
if (!empty($response['errors'])) {
    $response['message'] = 'Validation failed';
    echo json_encode($response);
    exit;
}

// Prepare email content
$to = "info@example.com"; // Replace with your email
$subject = "New Contact Form Submission";
$email_content = "
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    <p><strong>Message:</strong> {$message}</p>
</body>
</html>
";

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . $to,
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
];

// Try to send email
try {
    if (mail($to, $subject, $email_content, implode("\r\n", $headers))) {
        $response['success'] = true;
        $response['message'] = 'Thank you for your message. We will get back to you soon!';
    } else {
        throw new Exception('Failed to send email');
    }
} catch (Exception $e) {
    $response['message'] = 'Failed to send message. Please try again later.';
    // Log the error (implement your error logging here)
    error_log("Form submission error: " . $e->getMessage());
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
