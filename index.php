<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>
<body>
    <h2>CRUD - CREATE READ UPDATE DELETE</h2>
    <h3>Tela Login</h3>
    <form method="post">
        <label>Usuário:</label>
        <input type="email" name="email" id="" placeholder="Digite seu email.">
        <label>Senha:</label>
        <input type="password" name="senha" id="" placeholder="Digite sua senha.">
        <input type="submit" value="LOGAR">
        <a href="cadastro.php">Cadastre-se</a>
    </form>

    <?php

        if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']); 

            if(!empty($email) && !empty($senha)){
                
                $usuario->connect("cadastroturma32", "localhost", "root", "");
                if($usuario->msgErro == ""){

                    if($usuario->logar($email, $senha)){
                        header("location: areaprivada.php");
                    }
                    else{
                        ?>
                        <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            Email e/ou senha estão incorretos.
                        </div>
                        <!-- Fim da area do html -->
                        <?php
                    }
                }
                else{
                    ?>
                    <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            <?php
                                echo"Erro: ". $usuario->msgErro;
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
                        Preencha todos os campos!.
                    </div>
                <!-- Fim da area do html -->                        
                <?php
            }
        }
    ?>
</body>
</html>
