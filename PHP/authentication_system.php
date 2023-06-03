<?php
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar as credenciais no banco de dados
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verificar a senha
        if (password_verify($password, $storedPassword)) {
            $_SESSION['username'] = $username;
            header('Location: router_protected.php');
            exit;
        } else {
            // Senha incorreta
            $error = 'Nome de usuário ou senha inválidos.';
        }
    } else {
        // Usuário não encontrado
        $error = 'Nome de usuário ou senha inválidos.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="authentication_system.php">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
