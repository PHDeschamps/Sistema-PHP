<?php
require '../init.php';

if (!is_admin() && !is_editor()) {
    redirect('../login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Painel de Administração</h1>
    <ul>
        <li><a href="add_movie.php">Adicionar Filme</a></li>
    </ul>
</body>
</html>
