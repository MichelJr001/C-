<?php

    $con = mysqli_connect("localhost", "root", "toor", "qyart") or die("[!] Erro ao se conectar com o banco!");
    mysqli_select_db($con, "qyart");

    // if (mysqli_select_db($con, "qyart")){
    //     echo "[+] Conectado";
    // }
    // else{
    //     echo "[-] Desconectado";
    // }
?>