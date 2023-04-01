<!DOCTYPE html>
<html>
<head>
<style>
table{
  width: 100%;
  margin-bottom: 10px;
}
th{
 border: 1px solid black;
}
td{
 border: 1px solid black;
}
.formulario{
  border: 1px solid black;
  display: flex;
  flex-direction: column;
  align-items: center;
}
button{
  margin: 20px;
}


</style>
  <title>Página de login</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <section class="content">
    <div>
      <div class="dados">
        <?php
          $json = file_get_contents('users.txt');
          $usuarios = json_decode($json);

          echo "<table>";
          echo "<tr><th>Token</th><th>Users</th><th>Senhas</th><th>Cargos</th></tr>";

          $i = 0;
          
        while (isset($usuarios[$i])) {

        echo "<tr>";
        echo "<td>" . ($usuarios[$i]->login) . "</td>";
        echo "<td>" . base64_decode($usuarios[$i]->email) . "</td>";
        echo "<td>" . base64_decode($usuarios[$i]->senha) . "</td>";
        echo "<td>" . base64_decode($usuarios[$i]->papel) . "</td>";
        echo "</tr>";
      
        $i++;
      } 
          echo "</table>";
        ?>
      </div>
    </div>
    <form class="formulario" action="verificar.php" method="post">
      <h1>LOGIN</h1>
      <div>
        <label for="login">Token:</label>
        <input type="text" id="login" name="login">
      </div>
      <div>
        <label for="email">Login:</label>
        <input type="text" id="email" name="email">
      </div>
      <div>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
      </div>
      <div>
        <button type="submit">Entrar</button>
      </div>
    </form>
  </section>
  <script src="script.js"></script>
</body>
</html>
