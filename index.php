<?php   
include "config.index.php";

if (isset($_COOKIE['cart'])) {
    unset($_COOKIE['cart']);
    setcookie('cart', null, -1, '/');
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prototipo Lovendcode</title>
    <link rel="stylesheet" href="pages/index/index.css">
    <link rel="shortcut icon" href="assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.gPoogleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pages/footer/footer.css">
</head>

<body>

    <div id="headerBackground">
        <div id="headerInv">
            <div id="headerLogo">Pizzaria</div>
            <div id="headerMenuArea">

            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){?>
                
                <div id="meusAnunciosArea">
                    <img src="assets/imgs/megaphone-grey.png" class="imgsMenu" id="megaphone">
                    <div id="meusAnunciosText">Meus pedidos</div>
                </div>
                <div id="userStatus">
                    <img src="assets/imgs/user_pics/user_avatar/<?php echo $avatar; ?>" class="imgsMenu" id="userAvatar">

                    <div id="userArea"><div id="userName"><?php echo $nome; ?><span id="seta"><img src="assets/imgs/arrow.png" alt=""></span></div>

                        <ul id="userOpts">
                            <li id="menu-anuncios">Meus pedidos</li>
                            <li class="endC" id="plano-pro">Plano PREMIUM</li>
                            <li class="endC" id="menu-cad">Meus dados</li>
                            <li id="menu-sair">Sair</li>
                        </ul>

                    </div>
                </div>

                <div id="carrinhoBtn">
					<img src="assets/imgs/cart.ico">
				</div>


            <?php } else{ ?>

                <div id="meusAnunciosArea">
                    <img src="assets/imgs/megaphone-grey.png" class="imgsMenu">
                    <div id="meusAnunciosText">Meus pedidos</div>
                </div>

                <div id="areaLogin">
                    <img src="assets/imgs/user-icon-grey.png" class="imgsMenu" id="userLogin">
                    <div id="userName">Entrar</div>
                </div>

                <div id="carrinhoBtn">
					<img src="assets/imgs/cart.ico">
				</div>

            <?php } ?>

            </div>
        </div>
    </div>

<div id="all">

    





    <div id="bodyArea">
        <div id="seuEstadoArea">
            <div id="estadoTitleArea">
                <div id="estadoImgDiv"><img id="estadoIcon" src="assets/imgs/pin.png" alt=""></div>
                <div class="globalTitle Estado">Calcular frete</div><br>
            </div>
				 <div class="inputTitle">Bairro:</div>
				<input type="text" class="input" id="idBairro" name="idBairro">
            <div id="estadoContainerOpts">
            </div>
        </div>
		
		<div id="promoArea">
			<div id="promoTitleArea">
				<div class="globalTitle Estado">Promoção</div><br>
			</div>
			<div id="estadoContainerOpts">
				<img src="assets/imgs/promo.jpg">
            </div>
		</div>











            <div id="areaAR">
			        <div class="globalTitle AR">Cardapio</div>
                    <div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
					<div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
					<div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
				   <div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
				   <div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
				   <div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>       
            </div>


    </div>

</div>

<div id="footerArea">
        <div id="contentFooterArea">
            <div id="col1Footer">
                <a href="">Ajuda e <br> contato</a>
                <a href="">Dicas de<br> segurança</a>
                <a href="">Vender no<br> Pizzaria</a>
                <a href="">Plano<br> Profissional</a>
            </div>

            <div id="col2Footer">
                <a href=""><img src="pages/footer/img/facebook.png" alt=""></a>
                <a href=""><img src="pages/footer/img/instagram.png" alt=""></a>
                <a href=""><img src="pages/footer/img/github.png" alt=""></a>
            </div>

            <div id="personalData">
                <span>&#169; Marcos Nocetti, Sorocaba - SP</span>
            </div>
        </div>
</div>





<script src="assets/frameworks/jquery-3.4.1.min.js"></script>
<script src="pages/index/index.js"></script>
</body>
</html>