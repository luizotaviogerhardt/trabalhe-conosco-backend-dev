<div id="header">
  <h1>Registro</h1>
  <head>
  <style>
  #header {
      border-top:7px solid #fff;
      margin:0 auto;
      background: #eee;
      height: 170px;
      font: 12px arial, sans-serif;
  }

  #header h1 {
      margin-left: 30px;
      float: left;
      width: 287px;
      height: 140px;
      background: url(https://i.imgur.com/94NCV3r.png) no-repeat 0 0;
      text-indent: -9999px;
  }

  #header form {
      text-align: center;
      float: right;
      margin-top: 40px;
      margin-right: 250px;
      height: 40px;
      padding-top: 8px;
  }

  #header form label {
      display: inline-block;
      margin: 0 2px;
  }

  #header form input {}

  #header form #s-user,
  #header form #s-pass {
      margin-right: 20px;
      display: block;
      width: 250px;
      border: 1px solid #eee;
      padding: 3px 0 3px 0;
      margin-bottom: -1px;
  }
  #header form .submit {
      margin-left: 10px;
      height: 23px;
      vertical-align: bottom;
      background: #21c25e;
      color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
  }
  </style>
</head>
  <form id="search" method="POST">
    <label>Usuario <input type="text" name="user"></label>
    <label>Senha<input type="password" name="pass"></label>
    <input type="submit" class="submit" value="Registrar" name="register">
  </form>
</div><br><br>;

<?php
session_start();
require '../src/config/db.php';

if (isset($_POST['register']))
{
  $db = new db();
  $db = $db->connect();
  $user = $_POST['user'];
  $password = $_POST['pass'];



  $dupesql = "SELECT COUNT(*) FROM clientes where user = '$user'";
  $duperaw = $db->query($dupesql);
  $num_rows = $duperaw->fetchColumn();

  if ($num_rows > 0) {
    echo "Erro, usuario já existe";
  }

else
    {

        $sql = "INSERT INTO clientes (user, password) "
                . "VALUES ('$user',MD5('$password'))";

       $stmt = $db->query($sql);

    echo "Usuario criado com sucesso<div>";
    echo "<a class=\"button\" href=\"http://desafio.picpay/api/busca\" target=\"_self\"><button type=\"button\">Retornar a pagina principal</button></a></div>";

  }

}



?>
