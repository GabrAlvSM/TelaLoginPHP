<?php

Class Usuario{
    private $pdo;
    public $msgErro="";
    
    public function connect($nome, $host, $usuario, $senha){
        global $pdo;
        
        try{
            $pdo = new PDO("mysql:dbname=".$nome, $usuario, $senha);
        }
        catch(PDOException $erro){
            $msgErro = $erro->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;

        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :m");
        $sql->bindValue(":m", $email);
        $sql->execute();
        if ($sql->rowCount() > 0){
            return false;
        }
        else{
            $sql = $pdo->prepare("INSERT INTO usuario(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5(md5($senha)));
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha){

        global $pdo;

        $sqlVerificarEmailSenha = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
        $sqlVerificarEmailSenha->bindValue(":e", $email);
        $sqlVerificarEmailSenha->bindValue(":s", md5(md5($senha)));
        $sqlVerificarEmailSenha->execute();

        if($sqlVerificarEmailSenha->rowCount()>0){
            $dados = $sqlVerificarEmailSenha->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            return true;
        }
        else{
            return false;
        }
    }

    public function listarUsuarios(){
        
        global $pdo;

        try{
            $sqlPuxaBanco = $pdo->query("SELECT * FROM 'usuario'");
            $sqlPuxaBanco->setFetchMode(PDO::FETCH_ASSOC);

            // $listaUsuario = [];

            while($row = $sqlPuxaBanco->fetch()){
                $listaUsuario[] = [
                    // "id_usuario"=>$row["id_usuario"],
                    "nome"=>$row["nome"],
                    "telefone"=>$row["telefone"],
                    "email"=>$row["email"],
                    "senha"=>$row["senha"],
                ];
            }

            // $sqlPuxaBanco = $pdo->query("SELECT * FROM 'usuario'");
            // while ($row = $sqlPuxaBanco->fetch_assoc()) 
            // {
            //     echo '<tr>';
            //     // echo '  <td>'.$row["id_usuario"].'</td>';
            //     echo '  <td>'.$row["nome"].'</td>';
            //     echo '  <td>'.$row["telefone"].'</td>';
            //     echo '  <td>'.$row["email"].'</td>';
            //     echo '  <td>'.$row["senha"].'</td>';
            //     echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$row["Id"].'">Editar</a></td>';
            //     echo '</tr>';
            // }
            
            require "select.view.php";
        }
        catch(PDOException $erro){
            return "ERRO!";
        }   
    }
}

?>
