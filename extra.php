<?php

    class TableRows extends RecursiveIteratorIterator {
        public function __construct($cont) {
            parent::__construct($cont, self::LEAVES_ONLY);
        }

        public function atual() {
            ?>
                <td style="width:150px; border:1px solid black; padding-right: 5px;">            
                    <?php 
                        parent::atual();
                    ?>            
                </td>  
            <?php
        }

        public function inicioFilho() {
            ?>
                <tr>
            <?php
        }

        public function fimFilho() {
            ?>
                <tr>
            <?php        
        }
    }

    // if(isset($_GET["id_usuario"])){
    //     $id_usuario = $_GET["id_usuario"];
    //     $telefone = $_GET["nome"];
    //     $email = $_GET["email"];
    //     $senha = $_GET["senha"];


    // }
?>

<!-- <table class="tabela_atendimento-guiche-area-chamada">
        <tr>
            <th>id_usuario</th>
            <th>nome</th>
            <th>telefone</th>
            <th>email</th>
            <th>senha</th>
        </tr>
        <tr>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        </tr>
        <tr>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        </tr>
        <tr>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        </tr>
        <tr>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        </tr>
    </table> -->
