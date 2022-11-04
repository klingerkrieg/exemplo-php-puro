<?php
session_start();

#verifica se já está logado
if (isset($_SESSION['email'])){
	#envia para a tela do usuário já logado
	Header("Location:home/index.php");
}


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
