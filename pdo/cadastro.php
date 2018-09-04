<?php
    $host = "mysql:dbname=database;host=localhost";
    $usuario = "root";
    $senha = "toor";

    try{
        $pdo = new pdo($host, $usuario, $senha);
    }catch (PDOExecption $e){
        echo "Erro: ". $e->getMenssage();
    }

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

    $pdo->query("INSERT INTO usuarios (nome, senha, email, ip, data_cadastro, sexo, data_nascimento) VALUES ('$nome', '$passw', '$email', '$ip', '$date', '$sexo', '$nascimento')");

    $id = $pdo->lastInsertId();
    echo $id;

    $assunto = "Confirme seu cadastro!";
    $link = "127.0.0.1/confirma.php?h=". $id;
    $mensagem = "Clique aqui para confirmar seu cadastro: ". $link;
    $header = "From: Qyart";

    mail($email, $assunto, $mensagem, $header);
?>