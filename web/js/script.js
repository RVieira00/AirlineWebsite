console.log("script loaded");
$(function() {
    var selectedClass = "";
    $(".filter").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#gallery").fadeTo(100, 0.1);
        $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
        setTimeout(function() {
            $("."+selectedClass).fadeIn().addClass('animation');
            $("#gallery").fadeTo(300, 1);
        }, 300);
    });
});

function urlParams (name){			//para arranjar a variável do url
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
}

function message(color, text){

    var msg = $("#msg");
    $("#msg strong").empty();

    $("#msg strong").append(text);

    switch (color){
        case "red":     msg.addClass("alert-danger"); break;
        case "yellow":  msg.addClass("alert-warning"); break;
        case "green":   msg.addClass("alert-success"); break;
    }
    msg.addClass("alert-danger");

    msg.slideDown();

    $("#msg_close").on('click', function (){
        msg.slideUp();
    });

}

$( document ).ready(function() {

    $("#choose-route-form").submit(function(e){
        e.preventDefault();
    });

    $("#index_pesquisar_voos").on('click', function () {
        var origem = $("#origem").val();
        var destino = $("#destino").val();
        var date = $("#date").val();

        if(date === ""){
            message("red", "Por favor insira a data");
        }else if (origem === "" || destino === "") {
            message("red", "Destino ou origem inválido");
        }else if(origem === destino){
            message("red", "Destino e origem não podem ser iguais.");
        }else{
            window.location.href = "voos?origem="+origem+"&destino="+destino+"&data="+date;
        }
    });

    $("#go-to-detalhestrajeto").on('click', function(){
        location.reload();
    });

    $(".page-title").slideDown();

    setTimeout(function(){
        $("#contact-form").fadeIn(1000);
    }, 1000);




});

//on pjax ready
$(document).on('ready pjax:success', function(){
    $("#confimar_reserva").on("click", function (){
        console.log("efetuando reserva");
        var seatID = $('input[name=seat]:checked', '#seat-form').val();
        var TOS = $("#TOS_checkbox").prop("checked");
        var trajetoID = urlParams('trajetoID');
        var aviaoID = urlParams('aviaoID');
        console.log(trajetoID);

        if(!seatID){
            message('red', 'Por favor selecione um lugar');
        }else if(!TOS){
            message('red', 'Por favor aceite os termos de privacidade');
        }else{
            $.ajax({
                method: 'POST',
                url: '/voos/efetuarreserva',
                data:{
                    efetuarreserva : 1,
                    seatID : seatID,
                    trajetoID : trajetoID,
                    aviaoID: aviaoID
                },
                success: (res)=>{
                    console.log(res);
                    if(res == 0){
                        message('red', 'Ocorreu um erro ao submeter a sua reserva. Por favor tente mais tarde');
                    }else{
                        message('green', 'Reserva submetidada com sucesso. A redirecionar.');
                        setInterval(function(){
                            window.location.href = "/user/profile";
                        },1000);
                    }
                },
                error: (jqxhr, status, exception)=> {
                    message('red', 'Algo de errado aconteceu. Por favor tente mais tarde');
                }
            });
        }

    });
});