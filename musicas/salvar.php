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
	$arquivo    = "../uploads/".$_FILES['arquivo']['name'];
	
	#salva o arquivo na pasta de uploads
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);


	$sql = "INSERT INTO musicas (nome,artista,genero,ano,arquivo,usuario_id)
			VALUES (:nome,:artista,:genero,:ano,:arquivo,:usuario_id)";


	$stmt = $con->prepare($sql);
	$stmt->bindValue(':nome', $nome);
	$stmt->bindValue(':artista', $artista);
	$stmt->bindValue(':genero', $genero);
	$stmt->bindValue(':ano', $ano);
	$stmt->bindValue(':usuario_id', $_SESSION['id']);
	$stmt->bindValue(':arquivo', $arquivo);
	$stmt->execute();
	$id = $con->lastInsertId(); #pegando a id do ultimo inserido

	header("Location:./index.php?id=$id");
} else {
	
	
	$dadosNovos = [
		":id" 		=> $_POST['id'],
		":nome" 	=> $_POST['nome'],
		":artista" 	=> $_POST['artista'],
		":genero" 	=> $_POST['genero'],
		":ano" 		=> $_POST['ano']
	];
	
	
	if ($_FILES['arquivo']['name'] != ""){
		#atualiza o arquivo
		$arquivo    = "../uploads/".$_FILES['arquivo']['name'];
		#salva o arquivo novo na pasta de uploads
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);
		
		#acrescenta o update do arquivo no sql
		$sqlUpdateArquivo = ",arquivo = :arquivo";
		
		#inclui o arquivo no array de valores para o sql
		$dadosNovos[":arquivo"] =  $arquivo;
	} else {
		$sqlUpdateArquivo = "";
	}


	#SE EU ESTOU ATUALIZANDO/EDITANDO ALGUÉM
	#eu faço apenas uma UPDATE 

	$sql = "UPDATE musicas SET 
					nome = :nome,
					artista = :artista,
					genero = :genero,
					ano = :ano
					$sqlUpdateArquivo
				WHERE id = :id";
	
	
	$stmt = $con->prepare($sql);
	$stmt->execute($dadosNovos);
	header("Location:./index.php?id={$_POST['id']}");
}

