<?php
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
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
            $error = 'Invalid username or password.';
        }
    } else {
        // Usuário não encontrado
        $error = 'Invalid username or password.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Route pass authentication</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
*{  
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url('pexels-tiana-614484.jpg') no-repeat;
  background-size: cover;
  background-position: center;
}

.wrapper{
  position: relative;
  width: 400px;
  height: 440px;
  background: transparent;
  border: 2px solid rgba(255,255,255,0.5);
  border-radius: 20px;
  backdrop-filter: blur(20px);
  box-shadow: 0 0 30px rgba(0,0,0,0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  transition: transform .5s ease,height .2 ease;
 
}
.wrapper.active-popup{
  transform: scale(1);
}
.wrapper.active{
  height: 520px;
}
.wrapper .form-box{
  width: 100%;
  padding: 40px;
}
.wrapper .form-box.login{
  transition: transform .18s ease;
  transform: translateX(0);
}

.wrapper.active .form-box.login{
  transition: none;
  transform: translateX(-400px);
}
.wrapper .form-box.Register{
  position: absolute;
  transition: none;
  transform: translateX(400px); 
}
.wrapper.active .form-box.Register{
  transition: transform .18s ease;
  transform: translateX(0);
}

.form-box h2{
  font-size: 2em;
  color: #000;
  text-align: center;
}

.input-box{
  position: relative;
  width: 100%;
  height: 50px;
  border-bottom: 2px solid #000;
  margin: 30px 0 ;
}
.input-box label{
  position: absolute;
  left: 5px;
  font-size: 1em;
  color: #000;
  font-weight: 500;
  pointer-events: none;
 
}

.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  font-size: 1em;
  color: #000;
  font-weight: 600;
  padding: 15px 35px 0 5px;
}
.input-box .icon{
  position: absolute;
  right: 8px;
  font-size: 1.2em;
  color: #000;
  line-height: 57px;
}

.remeber{
  font-size: .9em;
  color: #000;
  font-weight: 500;
  margin: -15px 0 15px;
  display: flex;
  justify-content: space-between;
}

.remeber label input{
  accent-color: #000;
  margin-right: 3px;
}
.remeber a{
  color: #000;
  text-decoration: none; 
}
.remeber a:hover{
  text-decoration: underline;
}

.btn{
  width: 100%;
  height: 45px;
  background: #000;
  border: none;
  outline: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1em;
  color: white;
  font-weight: 500;

}

.login-register{
  font-size: .9em;
  color: #000;
  text-align: center;
  font-weight: 500;
  margin: 25px 0 10px;
}

.login-register p a{
  color: #000;
  text-decoration: none;
  font-weight: 600;
}
.login-register p a:hover{
  text-decoration: underline;

}

.btn:hover{
  font-weight: bold;
}

#label-auth{
    font-size: 20px;
  color: #333;
  font-weight: bold;
  margin-bottom: 5px;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}
.error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
  border: 1px solid red;
  background-color: #ffeeee;
  padding: 10px;
  border-radius: 4px;
  
  justify-content: center;
      align-items: center;
        display: flex;
          font-weight: 500;
          


}


    </style>
</head>
<body>
    <div class="wrapper">

    <form method="POST" action="authentication_system.php">
            <div class="form-box login">
            <label id="label-auth">Authentication is required to access the following page!</label>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="username" name="username" id="username" required>
            <label>User name:</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Password</label>
        </div>


        <button type="submit" class="btn">Login</button>
        </div>
        <?php if (isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>
    </form>
    </div>
</body>
</html>

</html>
