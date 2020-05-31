<?php
require('config.php');
    public static function prepare($query = false){
        if($query != false){
            if(self::$pdo == null){
                try{
                    $pdo = new PDO('mysql:host=localhost;dbname=prototipo', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e){
                    echo "<h2>Erro ao conectar!<h2>";
                }
            }
            $pdo = $pdo->prepare($query);
            return $pdo;
        }
        else{
            if (self::$pdo == null) {
                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=prototipo', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo "<h2>Erro ao conectar!<h2>";
                }
            }
            return $pdo;
        }
    }
    /* classe compra, responsavel por fazer operações no carrinho */    
    class compra{
        /* função para adionar itens no carrinho /OBS: guardar nomes dos itens e valor para utilizar nas outras funções/ */
        public function addCarrinho(){

        }
        /* soma o valor total para mostrar ao cliente quanto ele esta gastando ate o momento */
        public function valorTotal(){

        } 
        /* função para dar um delete dos itens selecionados pelo usuario */
        public function retirarCarrinho(){

        }
        /* confirmar o pedido para a entrega */
        public function confirmarPedido(){
            
        }   
    }
?>