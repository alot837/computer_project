<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$database = "schedule_management"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$class_name = $_POST['class_name'];
$subjects = $_POST['subjects'];

// Insert data into the database
$sql = "INSERT INTO classes (class_name, subjects) VALUES ('$class_name', '$subjects')";
if ($conn->query($sql) === TRUE) {
    echo "Class details saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
