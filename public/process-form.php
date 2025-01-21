<?php
// Set content type to JSON and prevent caching
header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

// Start session for CSRF protection
session_start();

// Set headers for security
header("Content-Security-Policy: default-src 'self'; frame-ancestors 'none'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: same-origin");
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method';
    http_response_code(405);
    echo json_encode($response);
    exit;
}

// Generate and verify CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (!isset($_SERVER['HTTP_X_CSRF_TOKEN']) || !hash_equals($_SESSION['csrf_token'], $_SERVER['HTTP_X_CSRF_TOKEN'])) {
    $response['message'] = 'Invalid security token';
    http_response_code(403);
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
    return filter_var($email, FILTER_VALIDATE_EMAIL) && 
           preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
}

// Function to validate phone number (international format)
function isValidPhone($phone) {
    return preg_match('/^\+?[1-9][0-9]{7,14}$/', preg_replace('/[^0-9+]/', '', $phone));
}

// Get and sanitize form data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['tel']) ? sanitizeInput($_POST['tel']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validate required fields
if (empty($name) || strlen($name) > 100) {
    $response['errors'][] = 'Name is required and must be less than 100 characters';
}

if (empty($email)) {
    $response['errors'][] = 'Email is required';
} elseif (!isValidEmail($email)) {
    $response['errors'][] = 'Invalid email format';
}

if (!empty($phone) && !isValidPhone($phone)) {
    $response['errors'][] = 'Invalid phone number format';
}

if (empty($message) || strlen($message) > 1000) {
    $response['errors'][] = 'Message is required and must be less than 1000 characters';
}

// If there are validation errors, return them
if (!empty($response['errors'])) {
    $response['message'] = 'Validation failed';
    http_response_code(400);
    echo json_encode($response);
    exit;
}

// Prepare email content with additional security measures
$to = "liam@341-webdesign.com"; // Replace with your email
$subject = "New Contact Form Submission";
$email_content = "
<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> " . $name . "</p>
    <p><strong>Email:</strong> " . $email . "</p>
    " . (!empty($phone) ? "<p><strong>Phone:</strong> " . $phone . "</p>" : "") . "
    <p><strong>Message:</strong> " . nl2br($message) . "</p>
    <p><small>Submitted on: " . date('Y-m-d H:i:s') . "</small></p>
</body>
</html>";

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . $email,
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
];

// Try to send email
try {
    if (mail($to, $subject, $email_content, implode("\r\n", $headers))) {
        $response['success'] = true;
        $response['message'] = 'Thank you for your message. We will contact you soon!';
        http_response_code(200);
    } else {
        throw new Exception('Failed to send email');
    }
} catch (Exception $e) {
    $response['message'] = 'An error occurred while sending your message. Please try again later.';
    error_log('Form submission error: ' . $e->getMessage());
    http_response_code(500);
}

// Return JSON response
echo json_encode($response);