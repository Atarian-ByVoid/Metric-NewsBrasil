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
$newPassword = $_POST['new_password'];

if (empty($username) || empty($newPassword)) {
    echo "Por favor, preencha todos os campos.";
} else {
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $username);
        $stmt->execute();
        
        echo "Senha redefinida com sucesso!";
    } else {
        echo "Nome de usuário não encontrado.";
    }
}

$conn->close();
?>
