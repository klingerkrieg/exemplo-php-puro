<?php
session_start();

require_once '../conexao.php';


$sql = "SELECT * FROM usuarios 
		WHERE email = :email AND senha = :senha";

$senha = hash("sha256", $_POST['senha']);

$stmt = $con->prepare($sql);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':senha', $senha);
$stmt->execute();

$rw = $stmt->fetch(\PDO::FETCH_ASSOC);


if ($rw == null) {
	#se nao encontrou ninguem com aquele email e senha
	$_SESSION["msg"] = "E-mail ou senha incorreta";
	#Redireciona para a tela de login
	Header("Location: ../index.php");
} else {
	$_SESSION['email'] = $rw['email'];
	$_SESSION['id']    = $rw['id'];
	
	Header("Location: ../home/index.php");
}
