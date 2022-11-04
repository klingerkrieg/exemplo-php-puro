
<a href="../index.php">Página de login</a>

<?php include '../home/menu.php'; ?>


<h3>Cadastro de usuários</h3>


<form action="salvar.php" method="POST">

	<input type="hidden" name="id" value="">

	<label>Nome
		<input name="nome" value="">
	</label> <br />

	<label>E-mail
		<input name="email" value="">
	</label> <br />

	<label>Senha
		<input type="password" name="senha" value="">
	</label> <br />

	<button>Enviar</button>

</form>
