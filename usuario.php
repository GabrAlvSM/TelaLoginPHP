<?php

Class Usuario{
    private $pdo;
    public $msgErro="";
    
    public function connect($nome, $host, $usuario, $senha){
        global $pdo;
        
        try{
            $pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);

            // $usuario -> connect("cadastroturma32", "localhost", "root", "");
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

    // LOGAR
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

    // LISTAR TODOS OS USUARIOS
    public function listar_usuarios(){
        
        global $pdo;

        try{
            // $sql = ("SELECT * FROM usuarios");
            // $temp = $pdo->query($sql);
            // return $temp->fetchAll(PDO::FETCH_ASSOC);

            $sqlGetFrom_usuario = ("SELECT * FROM usuario");
            $sqlPuxaBanco = $pdo->query($sqlGetFrom_usuario);
            $sqlPuxaBanco->fetch(PDO::FETCH_ASSOC);

            $listaUsuario = [];
        }
        catch(PDOException $erro){
            return "ERRO!";
        }
    }

    // public function listar_usuario(){
    //     global $pdo;

    //     try{
    //         foreach($sql)
    //     }
    // }

    // def select_cliente(self):
    // self.connect()
    // try:
    //     self.cursor.execute('SELECT * FROM cliente')
    //     clientes = self.cursor.fetchall()
    //     for registro in clientes:
    //         print(registro)

    # RETORNA O ERRO
    // except Exception as err:
    //     print(err)

    // LISTAR USUARIOS POR ID
    public function listar_usuario_id($id_usuario){
        
        global $pdo;

        try{
            $sqlPuxaBanco = $pdo->query("SELECT * FROM 'usuario' WHERE id_usuario = :u");
            $sqlPuxaBanco->bindValue(':u', $id_usuario);
            $sqlPuxaBanco->execute();

            return $sqlPuxaBanco->fetch(PDO::FETCH_ASSOC); 
        }

        catch(PDOException $erro){
            return "ERRO!";
        }
    }

    // EDITAR USUARIO
    public function editar_usuario_id($id_usuario, $nome, $telefone, $email) {
        global $pdo;

        $sqlEditUsu = $pdo->prepare("UPDATE usuario SET nome = :n, telefone = :t, email = :e WHERE id_usuario = :u");
        $sqlEditUsu->bindValue(":u", $id_usuario);
        $sqlEditUsu->bindValue(":n", $nome);
        $sqlEditUsu->bindValue(":t", $telefone);
        $sqlEditUsu->bindValue(":e", $email);
        $sqlEditUsu->execute(); 
    }

    // EXCLUIR USUARIO
    public function excluirUsuario($id_usuario){
        global $pdo;

        $sql = $pdo->prepare("DELETE usuario FROM usuario WHERE id_usuario = :idu");
        $sql->bindValue("idu", $id_usuario);
        $sql->execute();
    }
}

?>
