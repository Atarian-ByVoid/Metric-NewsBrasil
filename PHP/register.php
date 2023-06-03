<?php
// phpinfo();
$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (empty($username) || empty($password) || empty($email)) {
    echo "Por favor, preencha todos os campos.";
} else {
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "O nome de usuário já está em uso.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Criptografar a senha
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro bem-sucedido!";
        } else {
            echo "Erro ao registrar o usuário: " . $conn->error;
        }
    }
}

$conn->close();

?>
