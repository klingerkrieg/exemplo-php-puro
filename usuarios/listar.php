<?php
require_once '../conexao.php';

$stmt = $con->query("SELECT * FROM usuarios
                       ORDER BY nome");

print "<ul>";
while ($rw = $stmt->fetch(\PDO::FETCH_ASSOC)) {
	print "<li>
				<a href='index.php?id={$rw['id']}'>Editar</a>
	            - {$rw['email']} 
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