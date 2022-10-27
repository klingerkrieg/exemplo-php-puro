<?php

require_once '../conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->execute([':id' => $id]);

header("Location:index.php");
