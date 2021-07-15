<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conexao = new PDO("mysql:host=localhost;dbname=meubanco", "root", "");

$usuario = $_GET["usuario"];
$senha = $_GET["senha"];

$senhaCriptografada = md5($senha);

$preparacao = $conexao->prepare("SELECT * FROM usuario WHERE usuario=? and senha=?;");

$preparacao->bindParam(1, $usuario);
$preparacao->bindParam(2, $senhaCriptografada);

$resultado = $preparacao->execute();

print_r($resultado);

if($resultado > 0) {
  header("location: lista_usuarios.php");
} else {
  header("location: index.php");
}

?>