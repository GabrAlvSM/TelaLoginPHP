<?php
    require_once "usuario.php";
    $usuario = new Usuario();

    $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");

    // $usuarios = $usuario->listar_usuarios();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Privada do Usuario</title>
</head>
<body>
    <h2>--Usuarios cadastrados--</h2>

    <table class="lista-usuario" style='border: solid 1px black; padding:5px; background-color:wheat; '>
        <thead>    
            <tr>
                <th class="id_usu">Id_usuario</th>
                <th class="nome_usu">Nome</th>
                <th class="telefone_usu">Telefone</th>
                <th class="email_usu">Email</th>
                <th class="senha_usu">Senha</th>
                <th class="opcoes">Opções</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($usuarios as $usuario): ?>
                
                <tr>
                    <td><?= $usuario['id_usuario'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['senha'] ?></td>
                    <td>
                        <td>
                            <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a>
                            <a href="deletar.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>