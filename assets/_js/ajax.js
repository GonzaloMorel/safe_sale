//funcion contador para recargar la pagina
var url = window.location.pathname;
if(url === '/silisi/home/inicio' || url === '/silisi/index.php/home/inicio'){
setInterval(function(){
    ajax();
}    
,5000);
}
//funcion ajax, para llamado asincrono
function ajax(){
    $.ajax({
    url:baseUrl+'ajax/casos_usuario',
    dataType:'html',
    async:true,
    success:function(response){
        data = response;
        remplazar();
    },
    error: function (data){
        alert("Error");
    }
    });
}

//funcion reemplazar, reemplaza el contenido de las tablas con el ajax
function remplazar(){
    $('#tabs-0 div').html(data);
}

//funcion direccionCaso; redirecciona el caso
function direccionCaso(id){
    location.href=baseUrlShort+'caso/antecedentes_caso/'+id;
}

if(url === '/silisi/caso/crear_caso' || url === '/silisi/index.php/caso/crear_caso'){
//aqui se carga todo al cargar pagina
$(document).ready(function(){
    ajax();
    
    $.ajax({
        url:baseUrl+'ajax/paices',
        dataType:'html',
        async:true,
        success:function(paices){
            $('#paicesModal').html(paices);
        },
        error: function (paices){
            alert("Error");
        }
    });
});


function cargaRegiones(id){
//    var id = $(this).attr('id');
    var id_desc = id.split('-');
    $.ajax({
        url:baseUrl+'ajax/regiones/'+id_desc[1],
        dataType:'html',
        async:true,
        success:function(regiones){
            $('#regionesModal').html(regiones);
        },
        error: function (regiones){
            alert("Error");
        }
    });
}

function cargaProvincias(id){
    var id_desc = id.split('-');
    $.ajax({
        url:baseUrl+'ajax/provincias/'+id_desc[1],
        dataType:'html',
        async:true,
        success:function(provincias){
            $('#provinciasModal').html(provincias);
        },
        error: function (provincias){
            alert("Error");
        }
    });
}

function cargaComunas(id){
    var id_desc = id.split('-');
    $.ajax({
        url:baseUrl+'ajax/comunas/'+id_desc[1],
        dataType:'html',
        async:true,
        success:function(comunas){
            $('#comunasModal').html(comunas);
        },
        error: function (comunas){
            alert("Error");
        }
    });
}
}//fin ajax creacion_caso

//inicio ajax creacion_documentos
//if(url == '/silisi/caso/antecedentes_caso'){
$('#sub_proceso').change(function(){
    var seleccion = $('#sub_proceso').val();
    $.ajax({
        url:baseUrl+'ajax/documentos/'+seleccion,
        dataType:'html',
        async:true,
        success:function(documentos){
            $('#tipo_doc').html(documentos);
        },
        error: function (documentos){
            alert("Error");
        }
    });
});

function buscarDocumento(id){
    $.ajax({
        url:baseUrl+'ajax/editar_documento/'+id,
        dataType:'html',
        async:true,
        success:function(documentos){
            $('#formEditDoc').html(documentos);
        },
        error: function (documentos){
            alert("Error");
        }
    });
}
