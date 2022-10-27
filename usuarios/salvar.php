<?php
session_start();

include "../conexao.php";

#se estou salvando um novo
if ($_POST['id'] == "") {

	$email = $_POST['email'];
	$senha = hash("sha256", $_POST['senha']);

	$sql = "INSERT INTO usuarios(nome,email,senha)
			VALUES (:nome,:email,:senha)";


	$stmt = $con->prepare($sql);
	$stmt->bindValue(':nome', $email);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':senha', $senha);
	$stmt->execute();
	$id = $con->lastInsertId();

	header("Location:index.php?id=$id");
} else {

	if ($_POST["senha"] == "") {
		#se a senha nao foi enviada
		#eu deixo ela do jeito que estava
		#modifico apenas as outras informações
		$sql = "UPDATE usuarios SET 
					nome = :nome,
					email = :email
				WHERE id = :id";

		$stmt = $con->prepare($sql);
		$stmt->execute([
			":id" => $_POST['id'],
			":nome" => $_POST['nome'],
			":email" => $_POST['email']
		]);
	} else {

		#SE EU ESTOU ATUALIZANDO/EDITANDO ALGUÉM
		#eu faço apenas um UPDATE 

		$sql = "UPDATE usuarios SET 
					nome = :nome,
					email = :email,
					senha = :senha
				WHERE id = :id";


		$senha = hash("sha256", $_POST['senha']);

		$stmt = $con->prepare($sql);
		$stmt->execute([
			":id" => $_POST['id'],
			":nome" => $_POST['nome'],
			":email" => $_POST['email'],
			":senha" => $senha
		]);
	}
	header("Location:index.php?id={$_POST['id']}");
}
