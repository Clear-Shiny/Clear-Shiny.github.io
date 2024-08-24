<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);

    // Perform server-side validation (optional)
    if (!empty($first_name) && !empty($last_name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you would typically save the data to a database or perform other actions

        // For demonstration, we'll just return a success message
        echo json_encode(['success' => true, 'message' => 'Subscription successful!']);
    } else {
        // Return an error message if validation fails
        echo json_encode(['success' => false, 'message' => 'Invalid input. Please check your data and try again.']);
    }
} else {
    // Return an error message if the request method is not POST
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>