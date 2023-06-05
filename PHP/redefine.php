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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif ($newPassword !== $confirmPassword) {
        echo "The passwords entered do not match.";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $hashedPassword, $email);
            $stmt->execute();

            echo "Password successfully reset!";
            header("Location: login.html");

        } else {
            echo "Email not found.";
        }
    }
}

$conn->close();
?>
