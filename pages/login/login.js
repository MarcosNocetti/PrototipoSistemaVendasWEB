$( document ).ready(function(){

    $('#LAtitle').on('click', function(){
        window.location.href = "../../index.php";
    });

    $('#formLogin').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'config.login.php',
            data: $(this).serialize(),
            success: function(data){
                console.log(data);
                if (data[11] == 'd') {
                    $('.input').attr('disabled', 'disabled');
                    $('#btnSubmit').text('Sucesso!, redirecionando ao login em 3 segundos');
                    setInterval(function () {
                        if (document.cookie.split(';').some((item) => item.trim().startsWith('cart='))) {
                            window.location.href = "../carrinho/carrinho.php";
                        }else {
                            history.go(-1);
                        }
                    }, 3000);
                } else if (data[11] == 'f'){
                    $('.input').removeClass('input').addClass('inputFail');
                    $('.error.email').text('');
                    $('.error.senha').text('Usuário e/ou senha inválido(s)');
                } else if (data[11] == 'e') {
                    $('#userEmail.input').removeClass('input').addClass('inputFail');
                    $('#userPass.inputFail').removeClass('inputFail').addClass('input');
                    $('.error.senha').text('');
                    $('.error.email').text('Digite o email');
                } else if (data[11] == 's') {
                    $('#userPass.input').removeClass('input').addClass('inputFail');
                    $('#userEmail.inputFail').removeClass('inputFail').addClass('input');
                    $('.error.email').text('');
                    $('.error.senha').text('Digite a senha');
                }
                else {
                    if (data[11] == '2') {
                        $('.input').removeClass('input').addClass('inputFail');
                        $('.error.email').text('Digite um email');
                        $('.error.senha').text('Digite uma senha');
                    }
                }
            }
        });
    });

    $('#loadingDiv').hide();

    $('#FBLoginBtn').on('click', function(){
        $('#loadingDiv').show();
    });

});
