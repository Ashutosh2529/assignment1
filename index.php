<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

$healthReport = $_FILES['healthReport']['name'];
$healthReportTmpName = $_FILES['healthReport']['tmp_name'];
$healthReportPath = "uploads/" . $healthReport;

// Move the uploaded file to the designated folder
if (move_uploaded_file($healthReportTmpName, $healthReportPath)) {
    // File moved successfully, insert data into the database
    $sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', $age, $weight, '$email', '$healthReportPath')";
    if ($conn->query($sql) === TRUE) {
        echo "User details and health report inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading the health report.";
}

$conn->close();
?>