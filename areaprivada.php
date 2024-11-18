<?php
    require_once "usuario.php";
    $usuario = new Usuario();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table class="get-usuarios" style='border: solid 1px black; padding: 5px;'>
    <tr>
        <th>nome</th>
        <th>telefone</th>
        <th>email</th>
        <th>senha</th>
    </tr>
    <?php foreach($usuario as $row): ?>
    <tr>
        <td><?= $row["nome"] ?></td>
        <td><?= $row["telefone"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["senha"] ?></td>
    </tr>

    <?php endforeach; ?>
    
</body>

</html>