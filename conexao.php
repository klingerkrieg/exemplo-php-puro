<?php
#AJUSTE O CAMINHO PARA O BANCO
$con = new \PDO("sqlite:C:\\xampp73\\htdocs\\exemplo-php-puro\\banco.sqlite");

if (empty($sql)) {
    $sql = " CREATE TABLE IF NOT EXISTS 'usuarios'(
        id INTEGER,
        nome varchar(255) NULL,
        email varchar(255) NOT NULL,
        senha varchar(40),
        PRIMARY KEY(id AUTOINCREMENT)
    );";
    $con->exec($sql);

    $sql = " CREATE TABLE IF NOT EXISTS 'musicas'(
        id INTEGER,
		usuario_id INTEGER,
        nome varchar(255) NOT NULL,
        artista varchar(255),
        genero varchar(255),
        ano varchar(4),
		arquivo varchar(2000),
        PRIMARY KEY(id AUTOINCREMENT)
    );";
    $con->exec($sql);
}

/**
 * Verifica se uma variável existe, 
 * se não existir retorna null
 */
function _v($arr, $v)
{
    if (isset($arr[$v])) {
        return $arr[$v];
    } else {
        return null;
    }
}
