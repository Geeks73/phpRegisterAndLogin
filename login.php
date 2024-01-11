<?php
// Include the database connection file
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user credentials
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password";
    }

    $stmt->close();
    $conn->close();
}
?>
