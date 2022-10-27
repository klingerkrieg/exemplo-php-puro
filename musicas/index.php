<?php
session_start();
require_once '../conexao.php';


#Redireciona par ao login, caso nao esteja logado
if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:../index.php");
}


$rw = [];
if (isset($_GET['id'])) {
	$stmt = $con->query("SELECT * FROM musicas WHERE id = :id");
	$stmt->bindValue(':id', $_GET['id']);
	$stmt->execute();
	$rw = $stmt->fetch(\PDO::FETCH_ASSOC);
	#print_r($rw);
}
?>


<div style="float:right;"><?= $_SESSION['email'] ?>
	|
	<a href="../auth/logout.php">Logout</a>
</div>


<h3>Cadastro de Músicas</h3>


<form action="./salvar.php" method="POST">

	<input type="hidden" name="id" value="<?= _v($rw, 'id') ?>">

	<label>Nome da Faixa
		<input name="nome" value="<?= _v($rw, 'nome') ?>">
	</label> <br />

	<label>Artista
		<input name="artista" value="<?= _v($rw, 'artista') ?>">
	</label> <br />

	<label>Gênero
		<input name="genero" value="<?= _v($rw, 'genero') ?>">
	</label> <br />

	<label>Ano
		<input name="ano" value="<?= _v($rw, 'ano') ?>">
	</label> <br />

	<button>Enviar</button>

</form>


<?php include './listar.php' ?>