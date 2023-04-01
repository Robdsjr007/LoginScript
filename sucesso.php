<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <style>
   .nav{
     display: flex;
     justify-content: space-between;
   }
    h1{
     text-align: center;
    }
    p{
     text-align: center;
    }
    .dest{
      color: blue;
    }

  </style>
  <title>Login</title>
</head>
<body>
  <div class="nav"> 
  <a class="link1" href="index.php">Voltar</a>
    <br>
  <form method="post" action="logout.php">
    <button type="submit">Sair</button>
  </form>
  </div>
  <div class="content">
    <div class="bloco1"> 
    
  <?php  

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) and !isset($_SESSION['login']) == true) {

      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset($_SESSION['login']);
      echo "<script>alert('Sessão Expirada!'); document.location.href='index.php';</script>";

    }

    $emaillogado = $_SESSION['email'];
    $senhalogado = $_SESSION['senha'];
    $papellogado = $_SESSION['papel'];

   $descriptsenha = base64_decode($senhalogado);
   $descriptemail = base64_decode($emaillogado);
   $decriptpapel = base64_decode($papellogado); 

?>
      

  <?php if (isset($papellogado)): ?>
    <h1>Olá <?php echo $decriptpapel; ?>!</h1>
    <p>Sua autenticação foi um sucesso.</p>
    <p>Seu papel criptografado é: <strong class="dest"><?php echo $papellogado; ?></strong><p>
    <strong>Email e senha criptogradas:</strong>
    <p>Email: <strong class="dest"><?php echo $emaillogado; ?></strong><p>
    <p>Senha: <strong class="dest"><?php echo $senhalogado; ?></strong><p>
    <strong>Email e senha DEScriptografadas:</strong>
    <p>Email: <strong class="dest"><?php echo $descriptemail; ?></strong><p>
    <p>Senha: <strong class="dest"><?php echo $descriptsenha; ?></strong><p>
    
  <?php else: ?>
    <p>Ocorreu um erro ao processar sua solicitação.</p>
  <?php endif; ?>
</div>
  </div>
</body>
</html>
