<?php
session_start();
require_once '../conexao.php';

#Redireciona par ao login, caso nao esteja logado
if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:../index.php");
}


#se estou salvando um novo
if ($_POST['id'] == "") {

	$nome 		= $_POST['nome'];
	$artista 	= $_POST['artista'];
	$genero 	= $_POST['genero'];
	$ano 		= $_POST['ano'];


	$music = "INSERT INTO musicas (nome,artista,genero,ano)
			VALUES (:nome,:artista,:genero,:ano)";


	$stmt = $con->prepare($music);
	$stmt->bindValue(':nome', $nome);
	$stmt->bindValue(':artista', $artista);
	$stmt->bindValue(':genero', $genero);
	$stmt->bindValue(':ano', $ano);
	$stmt->execute();
	#print $con->lastInsertId(); #pegando a id do ultimo inserido

	header("Location:./cadastro-musica.php");
} else {

	#SE EU ESTOU ATUALIZANDO/EDITANDO ALGUÉM
	#eu faço apenas uma UPDATE 

	$music = "UPDATE musicas SET 
					nome = :nome,
					artista = :artista,
					genero = :genero,
					ano = :ano

				WHERE id = :id";


	$stmt = $con->prepare($music);
	$stmt->execute([
		":id" 		=> $_POST['id'],
		":nome" 	=> $_POST['nome'],
		":artista" 	=> $_POST['artista'],
		":genero" 	=> $_POST['genero'],
		":ano" 		=> $_POST['ano']

	]);
}
header("Location:./cadastro-musica.php");
