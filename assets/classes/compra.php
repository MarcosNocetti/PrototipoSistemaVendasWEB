<?php
require('config.php');
    /* ta falando que tem um erro aqui mas ainda não achei */
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
        public function addCarrinho($id){
            $sql = 'SELECT * FROM `tb_site.anuncios` WHERE id = ?';
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($id));
    
            if($sql->rowCount() > 0){
                /* retornar o valor nome do item com o id selecionado e preço no carrinho */
                return true;
            }else{
                return false;
            }
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