<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:index.php");
}


?>

<div style="float:left;">Seja bem vindo(a) <?= $_SESSION['email'] ?>!!</div>
<div style="float:right;"><?= $_SESSION['email'] ?>
	|
	<a href="logout.php">Logout</a>
</div><br>
<div style="display: flex;justify-content:center;align-items:center;">
	<a style="text-decoration:none;" href="./cadastro-usuario.php">Cadastro de Usuários &nbsp</a>
<div>
	<div><a style="text-decoration:none;" href="./musics/cadastro-musica.php">Cadastro de Músicas</a></div>