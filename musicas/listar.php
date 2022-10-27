<?php
#Redireciona par ao login, caso nao esteja logado
if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:../index.php");
}

$stmt = $con->query("SELECT * FROM musicas ORDER BY nome, artista");

print "<ul>";
while ($rw = $stmt->fetch(\PDO::FETCH_ASSOC)) {
	print "<li>
				<a href='cadastro-musica.php?id={$rw['id']}'>Editar</a>
	            - {$rw['nome']} - {$rw['artista']} - {$rw['genero']} - {$rw['ano']} 
				- <a href='#' onclick='confirmarDeletar(\"deletar.php?id={$rw['id']}\")' >Deletar</a> </li>";
}
print "</ul>";


?>

<script>
	function confirmarDeletar(link) {

		if (confirm("Deseja deletar o item?")) {
			window.location = link;
		}
	}
</script>