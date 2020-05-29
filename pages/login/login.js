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
                alert(data[11]);
                if (data[11] == 'd') {
                    $('.input').attr('disabled', 'disabled');
                    $('#btnSubmit').text('Sucesso!, redirecionando ao login em 3 segundos');
                    setInterval(function () {
                        window.location.href = "../../index.php";
                    }, 3000);
                } if (data[11] == 'f') {
                    $('.input').removeClass('input').addClass('inputFail');
                    $('.error.senha').text('Não são permitidos campos vazios!');
                } else {
                    $('.input').removeClass('input').addClass('inputFail');
                    $('.error.senha').text('Usuário não encontrado!');
                }
            }
        });
    });

    $('#loadingDiv').hide();

    $('#FBLoginBtn').on('click', function(){
        $('#loadingDiv').show();
    });

});
