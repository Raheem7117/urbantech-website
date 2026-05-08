<?php
$conn = new mysqli("localhost", "root", "", "urbantech_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];

$sql = "INSERT INTO customers (client_name, client_email, client_password, client_phone) 
        VALUES ('$fullname', '$email', '$hashed_password', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Registration Successful!</h2>";
    echo "<p>Welcome $fullname! <a href='index.html'>Return to Homepage</a></p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>