<?php
    require_once 'usuario.php';
    $usuario = new Usuario;

    // $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");
    $usuario -> connect("cadastroturma32", "localhost", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar e Atualizar Usuário</title>
</head>
    <h2>Editar e Atualizar Usuário</h2>
    
    <?php 
        if(isset($_GET['id_usuario'])){
            $id_usuario = $_GET['id_usuario'];
            
            $query = ('SELECT * FROM usuario WHERE id_usuario=:iu LIMIT 1');
            $statement = $pdo->prepare($query);
            $data = [':iu' => $id_usuario];
            $statement->execute($data);
            
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        ?>
    
    <form action="usuario.php" method="POST">
    
    <label for="id_usuario">Id_usuario:</label>
    <input type="text" name="id_usuario" value="<?= $result['id_usuario']; ?>" required><br><br>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?= $result['nome']; ?>" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="<?= $result['telefone']; ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $result['email']; ?>" required><br><br>
    
    <label for="senha">Senha:</label>
    <input type="password" name="senha" value="<?= $result['senha']; ?>" placeholder="Digite sua senha.">

    <button type="submit">Salvar alterações</button>
        <a href="areaprivada.php"Cadastre-se>VOLTAR</a>
    </form>

    <?php

    if(isset($_POST["nome"]))
    {
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confsenha = addslashes($_POST["confsenha"]);

        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confsenha))
        {
            // $usuario -> connect("cadastroturma32", "localhost", "devweb", "suporte@22");
            $usuario -> connect("cadastroturma32", "localhost", "root", "");
            if($usuario->msgErro == ""){
                
                if($senha == $confsenha){

                    if($usuario->cadastrar($nome, $telefone, $email, $senha)){                    
                        ?> 
                        <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            Cadastrado com sucesso;
                            Clique <a href="index.php">aqui</a>
                            para logar.
                        </div>
                        <!-- Fim da area do html -->
                        <?php
                    }
                    else{
                        ?>
                        <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            Email já cadastrado
                        </div>
                        <!-- Fim da area do html -->                        
                        <?php
                    }
                }
                else{
                    ?>
                    <div id="msg-sucesso">
                        Senha e Confirma senha não conferem.
                    </div>
                    <?php
                }
            }
            else{
                ?>
                <!-- Inicio da area do html -->
                    <div id="msg-sucesso">
                        <?php
                            echo"Erro: ".$usuario->msgErro;
                        ?>
                    </div>
                <!-- Fim da area do html -->                        
                <?php
            }
        }
        else{
            ?>
            <!-- Inicio da area do html -->
                <div id="msg-sucesso">
                    Preencha todos os campos.
                </div>
            <!-- Fim da area do html -->                        
            <?php
        }
    }
    ?>
</body>
</html>