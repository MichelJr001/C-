<?php

    require("conexao.php");
	
    if ($_POST) {
        $post = $_POST['newpost'];

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
		$id_user = $_COOKIE['usuario'];

        if(empty($post)){
            $erro = "<center><p>Escreva Alguma coisa antes de Postar!<p></center>";
        }
        else{
            $sql = "INSERT INTO posts (id_user, data, post) VALUES ('$id_user','$date', '$post')";
            if(!mysqli_query($con,$sql)){
                die("[ SISTEMA ]: Ouve um erro ao se cadastrar");
            }
        }
    }

    session_start();

    // if(!$_SESSION['usuario']){
    //     header("location:login/index.php");
	// }
	
	if(isset($_COOKIE['usuario'])){
		// print_r($_COOKIE);
		echo "a";
	}else{
		header("location:login/index.php");
	}
?>
<html lang="pt-br">
  <meta charset="utf-8" />
  <head>
    <title>Qyart</title>
		<meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1" />
		<link rel="icon" type="imagem/png" href="css/imgs/logo.png" />
    <!-- <link rel="stylesheet" type="text/css" href="_css/estilo_index.css" /> -->
		<style type="text/css">
			/**
			*
			*  @author: Michel Anderson
			*
			*/

			@font-face {
				font-family: 'Roboto';
				src: url(css/fonts/Roboto-Regular.ttf);
			}

			*{
				font-family: 'Roboto';
				margin: 0;
				padding: 0;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			body{
				background-image: url("css/imgs/background2.jpeg")
				/* background: #16161f; */
			}

			/**
			*
			* Menu do site
			*
			*/

			header {
				text-align: center;
				background: #1f1f1f;
				float: left;
				position: fixed;
				left: -14.600em; 
				width: 13.600em; 
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			#Menu_index ul{,
				text-align: center;
				align-items: center;
				list-style: none;
			}

			#Menu_index ul li{
				position: relative;
				display: block;
			}

			#Menu_index ul li a{
				color: #fff;
				background: #1f1f1f;
				text-decoration: none;
				padding: 15px 20px;
				display: block;
			}

			#Menu_index li ul{
				display: none;
			}

			#Menu_index ul li a:hover{
				color: #fff;
				background: #1f1f1f;
				border-left: 3px solid #00cc5b;
			}

			#Menu_index li:hover ul{
				color: #fff;
				display: block;
				position: relative;
			}

			#Menu_index li:hover li{
				color: #fff;
				float: none;
				font-size: 12px;
			}

			#Menu_index li:hover a{
				color: #fff;
				background: #1f1f1f;
				border-left: 3px solid #00cc5b;
			}
			#Menu_index li:hover li a{
				color: #fff;
				background: #1f1f1f;
				border: none;
			}

			#Menu_index li:hover li a:hover{
				color: #fff;
				background: #00cc5b;
				border: none;
			}

			/**
			*
			*  Formulario de postagem
			*
			*/

			.postinput{
				border-radius: 3px;
				font-size: 15px;
				float: left;
				margin-left: 20px;
				height: 50px;
				width: 220px auto;
				border: 1px solid #737373;
				color: #fff;
				background: #1f1f1f;
			}

			.postinput:focus{
				outline: none;
				font-size: 15px;
				color: #00cc5b;
				border: 1px solid #00cc5b;
			}

			.BtnPostar{
				background: #00cc5b;
				margin-left: 5px;
				color: #fff;
				font-size: 15px;
				border-radius: 3px;
				border: 0;
				float: left;
				width: 100px;
				height: 50px;
			}

			.BtnPostar:hover{
				background: #029c47;
			}

			a,p{
				color: #fff;
				text-decoration: none;
			}

			.ft{
				border-radius: 100%;
				margin-top: 20px;
				width: 100px;
			}

			.btnmenu{
				margin-left: 121px;
				margin-top: 0px;
				position: absolute;
			}

			/**
			*
			* Posts
			*
			*/

			#postagens{
				margin-top: 0;
				height: 90px;
				width: 350px;
				margin-left: 70% auto;
				margin-bottom: 500px auto;
			}

			#posts{
				margin-top: 100px;
				color: #fff;
				background: #1f1f1f;
				text-align: center;
				width: 200px;
				margin-left: 300px auto;
			}

			p{
				margin-top: 80px;
			}
		</style>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.big-slide.js"></script>
	<script>
    	$(document).ready(function() {
        	$('.btnmenu').bigSlide();
    	});
	</script>
  </head>
  <body>
    <!--- Cabeçalho do site -->
	<span id="topo"></span>
    <header id="menu">
		<!-- Perfil -->
		<a class="Btn" href="#">
			<div id="Perfil">
                <img class="ft" src="css/imgs/logo.png">
                <p><?php $_COOKIE['usuario']; ?></p>
			</div>
		</a>
		<a href="#menu" class="btnmenu"><img src="css/imgs/btnleft.png"></a> 
       <div id="Menu_index"><br>
        <ul>
          <!-- Menu 1 -->
          <li><a href="#">Amigos</a>
            <ul>
                <li><a href="#">On-line</a></li>
                <li><a href="#">Bloqueados</a></li>
            </ul>
          </li>
          <!-- Menu 2 -->
          <li><a href="#">Meus E-Books</a>
            <ul>
                <li><a href="#">Recentes</a></li>
                <li><a href="#">Repositórios</a></li>
            </ul>
          </li>
          <!-- Menu 3 -->
          <li><a href="#">Configurações</a>
            <ul>
                <li><a href="#">Conta</a></li>
                <li><a href="#">Geral</a></li>
            </ul>
          </li>
          <!-- Menu 4-->
          <li><a href="" onclick="<?php setcookie('usuario'); ?>">Logout</a></li>
        </ul>
		<p>Copyright Qyart © 2018</p>
      </div>
    </header>
	<center>
		<div id="postagens">
			<form id="publicar" method="post" action=""><br>
				<input type="text" class="postinput" required="required" name="newpost" maxlength="200" placeholder="    No que esta pensando" />
				<input type="submit" class="BtnPostar" value="Publicar"/>
			</form>
		</div>
	
		<div id="posts">
			<?php
            	$sql = "SELECT * FROM posts";
            	$resultados = mysqli_query($con, $sql);

            	if(mysqli_num_rows($resultados) > 0){
                	while($linha = mysqli_fetch_assoc($resultados)){
						echo "<ul>";
						echo $linha['id_user'];
						echo "<center>";
                    	echo $linha['post'];
						echo "</center>";
						echo "<ul>";
                	}
            	}
            	else{
                	echo "<center><h3>Nenhum post encontrado!<h3></center>". die(mysqli_error($con));
            	}
         	?>
	 	</div>
	</center>
  </body>
</html>
