var baseUrl = "http://localhost/silisi/index.php/";
var baseUrlShort = "http://localhost/silisi/";
$(document).ready(function () {

    $(function () {
        $("#rut").Rut({
            validation: true,
            format: true,
            format_on: 'change'
        })
    });

    $('#fechaOcurrencia').parent().datepicker({
        format: "dd-mm-yy",
        endDate: "+0d",
        todayBtn: "linked",
        language: "es"
    });

    $('#fechaDenuncio').parent().datepicker({
        format: "dd-mm-yy",
        endDate: "+0d",
        todayBtn: "linked",
        language: "es"
    });

    $('#fechaAsignacion').parent().datepicker({
        format: "dd-mm-yy",
        endDate: "+0d",
        todayBtn: "linked",
        language: "es"
    });

    $('.ui-datepicker-trigger').css({height: "20px"});

    $('#horaOcurrencia').timepicker();
    $('#horaAsignacion').timepicker();

    $('.ui-timepicker-trigger').css({
        "background": 'url("' + baseUrlShort + "assets/_timepicker/include/ui-1.10.0/ui-lightness/images/ui-icons_222222_256x240.png" + '") -79px, -96px',
        "width": "23px"
    });

    function runEffect(id, boton) {
        var options = {to: {height: 40}};
        $("#" + id).toggle('blind', options, 1000);
        var className = $('#' + boton).get(0).attr('class');
        if (className == 'glyphicon glyphicon-minus') {
            $("#" + boton).removeClass('glyphicon glyphicon-minus').addClass('glyphicon glyphicon-plus');
        }
        if (className == 'glyphicon glyphicon-plus') {
            $("#" + boton).removeClass('glyphicon glyphicon-plus').addClass('glyphicon glyphicon-minus');
        }
    }

    $('#ocultaMuestraCorredor').click(function () {
        runEffect('corredor', 'ocultaMuestraCorredor');
    });

    $('#ocultaMuestraCia').click(function () {
        runEffect('compania', 'ocultaMuestraCia');
    });

    $(function () {
        $("#inBtnAtras").click(function () {
            history.back(-1);
        });
    });

    //funcion para listar los ticket por nivel
    $(function () {
        $("#tabs").tabs();
    });

    $(function () {
        $(".button").button()
    });

    $(function () {
        function runEffect2(elem) {
            var options = {};
            $('#' + elem).toggle('slide', options, 500);
//            var padre = $('#'+elem).parent().attr('id');
//            alert (padre);
//            $('#'+elem).parent().css({'width':"20px"});

        }
        ;

        $("#btnLateral").click(function () {
            runEffect2('lateralInt');
        });
        $("#btnPorcentage").click(function () {
            runEffect2('porcentageInt');
        });
    });

    tinymce.init({
        selector: '.textEdit'
    });
//    function runCarousel(){
//        $('.shop').carouFredSel({
//            responsive : true,
//            items   :3,
//            width : '100%',
//            height : 'auto'
//        });
//
//    };
//    
//    runCarousel;

//    $("#products").carouFredSel();
    
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active');
    });
});




