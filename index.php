<?php

if (isset($_SESSION['email'])){
	Header("Location:cadastros.php");
}

//session_start();
#exibe a mensagem e erro
if (isset($_SESSION['msg'])) {
	print $_SESSION['msg'];
	#deleta da sessao
	unset($_SESSION['msg']);
}

?>

<h1>Login</h1>

<form action="auth/logar.php" method="POST">

	<label>E-mail
		<input name="email" value="">
	</label> <br />

	<label>Senha
		<input type="password" name="senha" value="">
	</label> <br />

	<button>Enviar</button>

	<a href="./usuarios/">Cadastrar usuário</a>

</form>
