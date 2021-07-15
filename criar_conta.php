<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conexao = new PDO("mysql:host=localhost;dbname=meubanco", "root", "");

$nome = $_GET["nome"];
$usuario = $_GET["usuario"];
$email = $_GET["email"];
$senha = $_GET["senha"];

$senhaCriptografada = md5($senha);

echo "aaa";

$preparacao = $conexao->prepare("INSERT INTO usuario(nome, usuario, email, senha) VALUES(?, ?, ?, ?)");

echo "aaaaa";

$preparacao->bindParam(1, $nome);
$preparacao->bindParam(2, $usuario);
$preparacao->bindParam(3, $email);
$preparacao->bindParam(4, $senhaCriptografada);

echo "aaaaasdsadjha";

$preparacao->execute();

echo "aaaasadssssssa";

header("Location: index.php");

?>