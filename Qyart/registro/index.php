<?php
    include('../conexao.php');

    if($_POST){
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        $nascimento = $_POST['ano']. $_POST['mes']. $_POST['dia'];
        $nome = $_POST['nome']. " ". $_POST['snome'];
        $email = $_POST['email'];
        $passw = $_POST['passw'];
        $rpassw  = $_POST['rpassw'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $sexo = $_POST['sexo'];
        $code = md5(uniqid(rand()));

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if ($passw == $rpassw) {
              $passw = md5($_POST['passw']);
              $sql = "INSERT INTO usuarios (nome, senha, email, ip, data_cadastro, sexo, data_nascimento) VALUES ('$nome', '$passw', '$email', '$ip', '$date', '$sexo', '$nascimento')";

              if($nascimento == 00000000){
                  $erro = "<span class='erro'><b>Erro</b>: Data de nascimento invalida!</span>";
              }else{
                  if(!mysqli_query($con,$sql)){
                    $erro = "<span class='erro'><b>Erro</b>: Email já cadastrado!</span>";
                  }else{
                    // $subject = "Confirmação de email qyart para $nome";
                    // $header = "Qyart.com: Confirme o seu e-mail.";
                    // $message = "Por favor clique no link abaixo para confirmar a sua conta. ";
                    // $message .= "https://www.qyart.com/registro/confirmar/?confimar=$code";
                    //
                    // $sentmail = mail($email,$subject,$message,$header);
                    //
                    // if($sentmail){
                    //   echo "<span class='erro'><b>Erro</b>: Registrado com sucesso, confirme no seu email!</span>";
                    // }else{
                    //   echo "<span class='erro'><b>Erro</b>: Não foi possivel se registrar, tente novamente mais tarde</span>";
                    // }
                    header("Location:../login/index.php");
                  }
              }
            }else {
              $erro = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
            }
        }
        else{
            $erro = "<span class='Erro'><b>Erro</b>: E-mail invalido!</span>";
        }
    }
?>

<html lang="pt-br">
  <meta charset="utf-8">
  <head>
    <title>Registro</title>
    <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=0.8"/>
    <link rel="icon" type="imagem/png" href="../css/imgs/logo.png" />
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
        height: 720px;
        /* background: #333; */
        margin: 20px auto;
        /* border-right: 6px solid #1f1f1f;
        border-bottom: 6px solid #1f1f1f; */

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
        margin: 45px 0;
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
        padding: 10px 20px;
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
        width: 125px;
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
        margin: 50px 0;
      }

      .logar{
        margin-left: 10px;
        box-shadow: 4px 4px #000;
        width: 125px;
        font-size: 15px;
        color: #fff;
        background: #ff0000;
      }

      .logar:hover{
        background: #bb0000;
        color: #deeffd;
      }

      .sec{
        background: #00cc5b;
        color: #fff;
        border: none;
        padding: 5px 20px;
        border-radius: 3px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-decoration: none;
        outline: none;
        /* box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); */
        box-shadow: 4px 4px #000;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      }

      .sec:hover{
        background: #00b350;
      }

      .erro{
          background-color: #ff0000;
          border: 1px solid #ff0000;
          padding: 6px 20px;
          border-radius: 10px;
          box-shadow: 4px 4px #000;
      }


      h3{
        color: #333;
      }

      p{
        margin-top: 5px;
        margin-bottom: 20px;
      }
    </style>
    <meta charset="utf-8"/>
  </head>
  <body>
    <center>
      <!-- Fomulario de registro -->
      <form id="login" method="post"><br>
        <div id="erro">
          <?php
            echo "<p>$erro</p>"
          ?>
        </div>
        <!-- input nome do usuario -->
        <div class="group">
          <input type="text" name="nome" autofocus autocomplete="off" required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Nome</label>
        </div>

        <!-- input sobrenome do usuario -->
        <div class="group">
          <input type="text" name="snome" autocomplete="off" required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Sobrenome</label>
        </div>

        <!-- input email do usuario -->
        <div class="group">
          <input type="text" name="email" autocomplete="off" required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Email</label>
        </div>

        <!-- input senha do usuario -->
        <div class="group">
          <input type="password" name="passw" autocomplete="off" minlength="8" required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Senha: </label>
        </div>

        <!-- input rsenha do usuario -->
        <div class="group">
          <input type="password" name="rpassw" autocomplete="off" minlength="8"  required="required"/><span class="highlight"></span><span class="bar"></span>
          <label>Repita a senha:</label>
        </div>

        <!-- Definindo sexo do usuario -->
        <h4>Sexo: </h4><br>
        <select class="sec" name='sexo'>
          <option value='M'>   Masculino</option>
          <option value='F'>   Feminino</option>
        </select><br><br>

        <!-- definindo ano de nascimento do usuario -->
        <h4>Data de nascimento:</h4><br>
        <select aria-label="Dia" required="require" name="dia" class="sec" title="Dia">
            <option value="0">Dia</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        <select aria-label="Mês" required="require" name="mes" class="sec" title="Mês">
            <option value="0">Mês</option>
            <option value="01">Jan</option>
            <option value="02">Fev</option>
            <option value="03">Mar</option>
            <option value="04">Abr</option>
            <option value="05">Maio</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Ago</option>
            <option value="09">Set</option>
            <option value="10">Out</option>
            <option value="11">Nov</option>
            <option value="12">Dez</option>
          </select>
        <select aria-label="Ano" required="require" name="ano" class="sec" title="Ano">
            <option value="0">Ano</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
            <option value="1949">1949</option>
            <option value="1948">1948</option>
            <option value="1947">1947</option>
            <option value="1946">1946</option>
            <option value="1945">1945</option>
            <option value="1944">1944</option>
            <option value="1943">1943</option>
            <option value="1942">1942</option>
            <option value="1941">1941</option>
            <option value="1940">1940</option>
            <option value="1939">1939</option>
            <option value="1938">1938</option>
            <option value="1937">1937</option>
            <option value="1936">1936</option>
            <option value="1935">1935</option>
            <option value="1934">1934</option>
            <option value="1933">1933</option>
            <option value="1932">1932</option>
            <option value="1931">1931</option>
            <option value="1930">1930</option>
            <option value="1929">1929</option>
            <option value="1928">1928</option>
            <option value="1927">1927</option>
            <option value="1926">1926</option>
            <option value="1925">1925</option>
            <option value="1924">1924</option>
            <option value="1923">1923</option>
            <option value="1922">1922</option>
            <option value="1921">1921</option>
            <option value="1920">1920</option>
            <option value="1919">1919</option>
            <option value="1918">1918</option>
            <option value="1917">1917</option>
            <option value="1916">1916</option>
            <option value="1915">1915</option>
            <option value="1914">1914</option>
            <option value="1913">1913</option>
            <option value="1912">1912</option>
            <option value="1911">1911</option>
            <option value="1910">1910</option>
            <option value="1909">1909</option>
            <option value="1908">1908</option>
            <option value="1907">1907</option>
            <option value="1906">1906</option>
            <option value="1905">1905</option>
          </select>

        <!-- input nome do usuario -->
        <div class="btn-box">
          <button class="btn btn-submit" type="submit">Registrar</button>
          <a class="btn logar" href="../login/">Logar</a>
        </div>
      </form>
      <p>Copyright Qyart © 2018</p>
    </center>
  </body>
</html>
