<?php
#Redireciona par ao login, caso nao esteja logado
if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:../index.php");
}


$sql = "SELECT * FROM musicas WHERE usuario_id = :usuario_id ORDER BY nome, artista";

$stmt = $con->prepare($sql);
$stmt->execute(['usuario_id' => $_SESSION['id']]); 

print "<ul>";
while ($rw = $stmt->fetch(\PDO::FETCH_ASSOC)) {
	print "<li>
				<a href='index.php?id={$rw['id']}'>Editar</a>
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