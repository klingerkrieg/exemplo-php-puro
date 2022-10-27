<?php
session_start();

require_once '../conexao.php';

$rw = [];
if (isset($_GET['id'])) {
	$stmt = $con->query("SELECT * FROM usuarios WHERE id = :id");
	$stmt->bindValue(':id', $_GET['id']);
	$stmt->execute();
	$rw = $stmt->fetch(\PDO::FETCH_ASSOC);
	#print_r($rw);
}
?>

<a href="../index.php">Página de login</a>

<?php if (isset($_SESSION['email'])):?>
<div style="float:right;"><?= $_SESSION['email'] ?>
	<a href="logout.php">Logout</a>
</div>
<?php endif; ?>


<h3>Cadastro de usuários</h3>


<form action="salvar.php" method="POST">

	<input type="hidden" name="id" value="<?= _v($rw, 'id') ?>">

	<label>Nome
		<input name="nome" value="<?= _v($rw, 'nome') ?>">
	</label> <br />

	<label>E-mail
		<input name="email" value="<?= _v($rw, 'email') ?>">
	</label> <br />

	<label>Senha
		<input type="password" name="senha" value="">
	</label> <br />

	<button>Enviar</button>

</form>


<?php include 'listar.php' ?>