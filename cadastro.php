<?php
    require_once "usuario.php";
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
    <h2>Cadastro</h2>
    <form action="" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" id="" placeholder="Digite seu nome.">
        <label>Telefone:</label>
        <input type="tel" name="tel" id="" placeholder="Digite seu telefone.">
        <label>Email:</label>
        <input type="email" name="email" id="" placeholder="Digite seu email.">
        <label>Senha:</label>
        <input type="password" name="senha" id="" placeholder="Digite sua senha.">
        <label>Confirmar Senha:</label>
        <input type="password" name="confsenha" id="" placeholder="Confirme sua senha.">
        <input type="submit" value="CADASTRAR">
        <a href="index.php"Cadastre-se>VOLTAR</a>
    </form>

    <?php
    if(isset($_POST["nome"]))
    {
        $nome = $_POST["nome"];
        $telefone = $_POST["tel"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confsenha = addslashes($_POST["confsenha"]);

        if(!empty($nome) && !empty($telefone ) && !empty($email) && !empty($senha) && !empty($confsenha))
        {
            $usuario -> connect("cadastroturma32", "localhost", "root", "");
            if($usuario -> msgErro == ""){
                
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
                        <div id="msg-erro">
                            Email já cadastrado
                        </div>
                        <!-- Fim da area do html -->                        
                        <?php
                    }
                }
                else{
                    ?>
                    <div id="msg-erro">
                        Senha e Confirma senha não conferem.
                    </div>
                    <?php
                }
            }
            else{
                ?>
                <!-- Inicio da area do html -->
                    <div id="msg-erro">
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
                <div id="msg-erro">
                    Preencha todos os campos.
                </div>
            <!-- Fim da area do html -->                        
            <?php
        }
    }
    ?>
</body>
</html>