<?php

// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'formulario-arthur';

// Conecta ao banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica se houve uma requisição de login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // Consulta o banco de dados para verificar se as credenciais são válidas
  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {
    // As credenciais são válidas, então redireciona para a página principal
    header('Location: index.php');
    exit();
  } else {
    // As credenciais são inválidas, então mostra uma mensagem de erro
    echo 'Email ou senha incorretos.';
  }
}

// Verifica se houve uma requisição de cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
}
  // Verifica se as senhas correspondem
  if ($password != $confirm_password) 
        echo('As senhas não estão corretas')
?>