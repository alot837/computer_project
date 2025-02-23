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

// Fetch class data
$sql = "SELECT * FROM classes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Classes</title>
</head>
<body>
    <h1>Class Details</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Class Name</th>
            <th>Subjects</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['class_name'] . "</td>
                        <td>" . $row['subjects'] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No classes found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
