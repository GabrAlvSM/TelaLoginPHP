<?php
    require_once "usuario.php";
    $usuario = new Usuario();

    // $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");
    $usuario -> connect("cadastroturma32", "localhost", "root", "");
<<<<<<< HEAD

    if (isset($_GET['excluir'])) {
        $id_usuario = intval($_GET['excluir']);
        $usuario->excluirUsuario($id_usuario);
        header("Location: areaprivada.php");
        exit;
    }
=======
>>>>>>> ba73175e054be3f6a0e745d5ee4bd861f593312e
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

    <table class="lista-usuario" style='border: solid 1px black; padding:10px; background-color:wheat; '>
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
            <?php
                $sqlFetch = ('SELECT * FROM usuario');
                $sqlStore = $pdo->prepare($sqlFetch);
                $sqlStore->execute();
    
                $resultado = $sqlStore->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC

                if($resultado){
                    foreach($resultado as $row){
                        ?>
                            <tr>
                                <td><?= $row->id_usuario;?></td>
                                <td><?= $row->nome;?></td>
                                <td><?= $row->telefone;?></td>
                                <td><?= $row->email;?></td>
                                <td><?= $row->senha;?></td>
                                <td>
<<<<<<< HEAD
                                    <a href="editar_usu.php?id_usuario<?= $row->id_usuario;?>" style="background-color: #111111; color: grey;">Editar</a>
                                    
                                    <a href="?excluir=<?= $user['id_usuario'] ?>" onclick="return confirm('Confirme para excluir este usuário.')">Excluir</a>
=======
                                    <a href="editar_usu.php?id_usuario<?= $row->id_usuario ?>" style="background-color: #111111; color: grey;">Editar</a>
                                    <button style="background-color: #111111; color: red;">Excluir</button>
>>>>>>> ba73175e054be3f6a0e745d5ee4bd861f593312e
                                </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <!-- colspan é a quantidade de colunas da tabela -->
                        <td colspan="5">Sem dados...</td>
                    </tr>
                    <?php                    
                }
            ?>
        </tbody>
    </table>
    <a href="index.php"Cadastre-se>Sair</a></form>
</body>
</html>