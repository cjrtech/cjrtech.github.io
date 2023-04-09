<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Create a timestamp for the comment
$timestamp = date('Y-m-d H:i:s');

// Connect to the database (replace with your own details)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO comments (name, email, comment, timestamp) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $comment, $timestamp);

// Execute the SQL statement
if ($stmt->execute()) {
  echo "Comment submitted successfully!";
} else {
  echo "Error submitting comment: " . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
