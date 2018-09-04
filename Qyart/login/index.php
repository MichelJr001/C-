<?php
    session_start();
    include('../conexao.php');

    if ($_POST){
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";
        $query = mysqli_query($con, $sql);

        if(!($query)){
            $erro = "<span class='Erro'><b>OPS</b>: Algo deu errado, tente mais tarde!</span>";
        }else{
            $row = mysqli_fetch_assoc($query);

            if ($row) {
              setcookie('usuario', $row["nome"]);
              // $_SESSION['usuario'] = $row['nome'];
              header("Location: ../index.php"); 
            }else{
              $erro = "<span class='Erro'><b>Erro</b>: login ou senha invalido</span>";
            }
        }
    }
?>

<html lang="pt-br">
  <meta charset="utf-8">
  <head>
    <title>Qyart - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=0.8"/>
    <!-- Folha de estilo do site -->
    <style type="text/css">
      @font-face {
        font-family: 'Roboto';
        src: url(../css/fonts/Roboto-Regular.ttf);
      }

      *{
        box-sizing: border-box;
        font-family: 'Roboto';
        margin: 0;
        padding: 0;
      }

      body{
        background: url('../css/imgs/background2.jpeg');
        background-repeat: no-repeat;
        /* background: #16161f; */
        color: #fff;
      }


      form {
        width: 450px;
        height: 320px;
        margin-top: 140px;
      }

      form hr.sep {
        background: #2196F3;
        box-shadow: none;
        border: none;
        height: 2px;
        width: 20%;
        margin: 0px auto 45px auto;
      }

      .group {
        position: relative;
        margin-top: 45px;
        margin-bottom: 50px;
      }

      input{
        background: none;
        color: #c6c6c6;
        font-size: 18px;
        padding: 5px 5px 7px 5px;
        display: block;
        width: 300px;
        border: none;
        border-radius: 0;
        border-bottom: 1px solid #fff;
      }
      input:focus{
        outline: none;
        color: #00cc5b;
      }
      input:focus ~ label, input:valid ~ label{
        top: -15px;
        font-size: 15px;
        color: #00cc5b;
      }
      input:focus ~ .bar:before{
        width: 320px;
      }

      input[type="password"] {
        letter-spacing: 0.3em;
      }

      label {
        color: #c6c6c6;
        font-size: 16px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 75px;
        top: 10px;
        transition: 400ms ease all;
      }

      .bar {
        position: relative;
        display: block;
        width: 320px;
      }
      .bar:before {
        content: '';
        height: 2px;
        width: 0;
        bottom: 0px;
        position: absolute;
        background: #00cc5b;
        transition: 300ms ease all;
        left: 0%;
      }

      .btn {
        background: #fff;
        color: #fff;
        border: none;
        padding: 10px 10px;
        border-radius: 3px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-decoration: none;
        outline: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      }
      .btn.btn-submit {
        box-shadow: 4px 4px #000;
        width: 120px;
        font-size: 15px;
        background: #00cc5b;
        color: #fff;
      }
      .btn.btn-submit:hover {
        background: #00b350;
        color: #fff;
      }

      .btn-box {
        text-align: center;
        margin: 20px 0;
      }

      .esc{
        color: #fff;
        text-decoration: none;
        font-size: 15px;
      }

      .esc:hover{
        color: #00cc5b;
      }

      .cad{
        margin-left: 10px;
        box-shadow: 4px 4px #000;
        width: 125px;
        font-size: 15px;
        color: #fff;
        background: #ff0000;
      }

      .cad:hover{
        background: #bb0000;
        color: #deeffd;
      }

      .erro{
          background-color: #ff0000;
          border: 1px solid #ff0000;
          padding: 6px 20px;
          border-radius: 10px;
          box-shadow: 4px 4px #000;
      }

      p{
        margin-top: 80px;
      }
    </style>
  </head>
  <body>
    <center>
      <!-- Formulario de login -->
      <form id="login" method="post">
      <!-- <h4>Escreva você sua historia com a Qyart</h4> -->
        <div id="erro">
          <?php
            echo "<p>$erro</p>";
          ?>
        </div>
        <!-- input nome do usuario -->
        <div class="group">
          <input type="text" name="login" autocomplete="off" autofocus required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>E-Mail</label>
        </div>

        <!-- input sobrenome do usuario -->
        <div class="group">
          <input type="password" name="senha" autocomplete="off" required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Senha</label>
        </div>
        

        <div class="btn-box">
          <button class="btn btn-submit" type="submit">Entrar</button>
          <a href="../registro/index.php" class="btn cad">Não sou cadastrado</a>
        </div>

        <a href="#" class="esc">Esqueci a senha</a>
      </form>
      
      <p>Copyright Qyart © 2018</p>
    </center>
  </body>
</html>
