<?php
// phpinfo();
$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Receber dados do formulário de login
$username = $_POST['username'];
$password = $_POST['password'];

// Validar os dados (exemplo: verificar se campos estão preenchidos)
if (empty($username) || empty($password)) {
    echo "Por favor, preencha todos os campos.";
} else {
    // Verificar se o nome de usuário existe no banco de dados
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            echo "Login bem-sucedido!";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Nome de usuário não encontrado.";
    }
}

$conn->close();
?>
