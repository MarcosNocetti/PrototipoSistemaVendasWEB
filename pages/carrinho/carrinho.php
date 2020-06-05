<?php
require 'C:/xampp/htdocs/pizza/assets/classes/Compra.class.php';
include 'C:/xampp/htdocs/pizza/config.index.php';

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
    setcookie('cart', 'true', time()+(60*60*24), '/');
    header("Location: ../login/login.php");
}

if (isset($_COOKIE['cart'])) {
    unset($_COOKIE['cart']);
    setcookie('cart', '', time()-1, '/');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="../../assets/frameworks/jquery.mask.min.js"></script>
    <script src="../../assets/frameworks/jquery.maskMoney.min.js"></script>
    <script src="anunciar.js"></script>
    <link rel="stylesheet" href="anunciar.css">
    <title>Inserir anúncio | Pizzaria</title>
</head>
<body>
    <div id="header">
        <div id="headerInv">
            <div id="headLogo"><p> Pizzaria </p></div>
            <a href="../home/logout.php" id="userStatusArea">
                <div>
                    Olá, <?php echo $nome;?> <span>&times;</span>
                </div>
            </a>
        </div>
    </div>

    <div id="title"><h2>Pedido no carrinho</h2></div>

    <div id="formArea">
        <form method="post" enctype="multipart/form-data" id="form">
            
            <div class="inputKit">
                <div class="titleForInput titulo">Seu nome</div>
                <input type="text" name="titulo" class="inputs" id="titulo">
                <div class="errorArea titulo"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput preco">Preço</div>
                <!--Arrumar esse echo e fazer a classe compra-->
                <h3  class="textForPreco"><?php echo  compra::valorTotal();?> <>
                <div class="errorArea preco"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput desc">Observações</div>
                <textarea name="desc" id="desc" cols="86" rows="10" id="desc" class="inputs desc"></textarea>
                <div class="errorArea desc"></div>
            </div>

            <div class="inputKit">
          <!-- Acho que aqui devemos adaptar pra mostrar uma tabela com os pedidos adicionados, basicamente dar um echo em tudo que foi adicionado ao carrinho--> 
          <!-- Ainda não fiz a funcao entao nao fiz o aqui o print -->

            </div>

            <div class="inputKit">
                <div class="titleForInput local">Localização</div>
                <input type="text" name="cep" class="inputs" id="cep" placeholder="CEP">
                <input type="text" name="estado" id="estado" class="inputs" readonly=“true”>
                <input type="text" name="cidade" id="cidade" class="inputs" readonly=“true”>
                <input type="text" name="bairro" id="bairro" class="inputs" readonly=“true”>
                <div class="errorArea cep"></div>
            </div>

            <div class="inputKit">
                <!-- Selecionar forma de pagamento -->
                <input type="radio" id="cash" name="payment" value="cash">
                <label for="male">Dinheiro</label><br><!-- adicionar função pra se dinheiro for selecionado perguntar do troco -->
                <input type="radio" id="credit" name="paymentr" value="credit">
                <label for="female">Crédito</label><br>
                <input type="radio" id="debit" name="payment" value="debit">
                <label for="other">Débito</label>
            </div>

            <div class="inputKit">
                <div class="titleForInput contato">Contato</div>
                <?php if($telefone == null){ ?>
                    <div id="numTelefone">Nenhum número cadastrado, para cadastrar <a href="../meus-dados/meus-dados.php" target="_blank">clique aqui!</a></div>
                <?php }else{ ?>
                    <div id="numTelefone"><?php echo $telefone; ?></div>
                <?php } ?>
            </div>
    </div>

        <div id="footer">
            <div id="footerInv">
                <div id="footerTerms"> Ao confirmar o pedido você concorda que os dados acima estão corretos <a href=""> Termos de Uso </a> e <a href=""> Privacidade </a></div>
                <input type="submit" value="Enviar Anúncio" id="btnSubmit">
            </div>
        </div>

        </form>

        <pre id="message"></pre>
</body>
</html>