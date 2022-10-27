<?php
require_once '../conexao.php';

#Redireciona par ao login, caso nao esteja logado
if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:../index.php");
}


$id = $_GET['id'];
$sql = "DELETE FROM musicas WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->execute([':id' => $id]);

header("Location:./index.php");
