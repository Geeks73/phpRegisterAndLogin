<?php
// Include the database connection file
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    // Prepare and execute the query
    $query = "INSERT INTO users (name, email, password, address, phone_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssss", $name, $email, $password, $address, $phone_number);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>
