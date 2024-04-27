<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "daniel";

$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

//if ($conexao->connect_errno){
//    echo"erro";
//}
//else{
//    echo"conexão estabelecida";
//}