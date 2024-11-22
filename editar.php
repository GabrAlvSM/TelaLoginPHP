<?php
    require_once 'usuario.php';
    $usuario = new Usuario;

    $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");

    if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $dados_usuario = $usuario->listar_usuario_id($id_usuario);
    } 
    else{
        header('Location: index.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
    
        $usuario->editar_usuario_id($id_usuario, $nome, $telefone, $email);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>--Edição de usuário--</h1>

    <form method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $dados_usuario['id_usuario']; ?>">

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $dados_usuario['nome']; ?>" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="<?php echo $dados_usuario['telefone']; ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $dados_usuario['email']; ?>" required><br><br>

    <button type="submit">Salvar alterações</button>
</form>

    <a href="getUsuario.php">Voltar</a>
</body>
</html>