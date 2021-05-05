
$(document).ready(function(){
    $('#search-cep').click(function(){
        var searchtxt = $('#search_txt').val();
        $.ajax({
            url: 'cep-api.php?cep='+ searchtxt,
            type: 'get',
            dataType: 'JSON',
            // data: {"endereco": searchtxt},
            success: function(response){
                console.log (response);
                // var address = 
                // response.logradouro +', '+
                // response.bairro +', '+
                // response.localidade +', '+
                // response.uf;
                $('#logradouro_txt').val(response.logradouro);
                $('#localidade_txt').val(response.localidade+', '+response.bairro);
                $('#uf_txt').val(response.uf);
                
            },
            error: function (err){
                console.log (err);
            }
        });
    });
});

