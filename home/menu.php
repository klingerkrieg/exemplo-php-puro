<?php if (isset($_SESSION['email'])):?>
    <div style="float:left;">Seja bem vindo(a) <?= $_SESSION['email'] ?>!!</div>
    <div style="float:right;"><?= $_SESSION['email'] ?>
        |
        <a href="../auth/logout.php">Logout</a>
    </div><br>
<?php endif; ?>

<a href="../usuarios/">Cadastro de Usuários</a>

<?php if (isset($_SESSION['email'])):?>
    <a href="../musicas/">Cadastro de Músicas</a>
<?php endif; ?>