<?php
    require_once 'usuario.php';
    $usuario = new Usuario;

    $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");

    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $dados_usuario = $usuario->listar_usuario_id($id_usuario); 
    } 
    else {
        $dados_usuario = $usuario->listar_usuarios();
    }

    if (isset($_POST['excluir_id'])) {

        $id_usuario_excluir = $_POST['excluir_id']; 

        if ($usuario->excluir_usuario_id($id_usuario)) {
            echo "<p>Usuário excluído!</p>";
            exit;
        }
    }
?>