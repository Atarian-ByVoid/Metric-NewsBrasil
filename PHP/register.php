<?php
// phpinfo();
$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (empty($username) || empty($password) || empty($email)) {
    echo "Please fill in all fields.";
} else {
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "The username is already in use.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Criptografar a senha
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
        if ($conn->query($sql) === TRUE) {
            header('Location: home.html');
        } else {
            echo "Error registering user: " . $conn->error;
        }
    }
}

$conn->close();

?>
