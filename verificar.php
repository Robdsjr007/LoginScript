<?php

  session_start();

  // Lê os usuários do arquivo users.txt
  $usuarios = file_get_contents('users.txt');
  $usuarios = json_decode($usuarios, true);
 
   // Obtém os dados do formulário
  $email = base64_encode($_POST['email']);
  $senha = base64_encode($_POST['senha']);
  $login = $_POST['login'];
  
  // Procura o usuário com o login e senha fornecidos
  foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email && $usuario['senha'] === $senha xor $usuario['login'] === $login) {
  $papel = $usuario['papel'];
  $s = $usuario['email'];
  $e = $usuario['senha'];
  // Redireciona o usuário para a página de sucesso
  $_SESSION['email'] = $s;
  $_SESSION['senha'] = $e;
  $_SESSION['papel'] = $papel;
  header('Location: sucesso.php?');
  exit();
 }
}
  // Redireciona o usuário para a página de erro
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['papel']);
 unset($_SESSION['login']);
  header('Location: erro.php');
  exit();

?>
