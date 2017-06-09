$( document ).ready(function(){

    $('.select2').select2({
        placeholder: "Seleccione"
    });
    
    $("input:text").attr('maxlength','45');

    $('#dtpFechaIngreso').datetimepicker({
        format: "YYYY"
    });

    if($('#fecha_avance_inf2').val() !== '')
    {
        $('#fecha_avance_inf2').removeAttr("readonly");
    }

    // $("Document").ready( function (e)
    // {
        var minDate = sumarDia($("#proyecto_fecha_inicio").val());
        if(minDate)
        {
            $('#proyecto_fecha_termino').attr("data-after",minDate);
            $('#proyecto_fecha_avance_inf').attr("data-after",minDate);
            $('#proyecto_fecha_fin_inf').attr("data-after",minDate);
        }

        var maxDate = $("#proyecto_fecha_termino").val();
        if(maxDate)
        {
            $('#proyecto_fecha_inicio').attr("data-before", maxDate);
            $('#proyecto_fecha_termino').attr("data-before", maxDate);
            $('#proyecto_fecha_avance_inf').attr("data-before", maxDate);
        }
        // var resta = restaFechas($('#proyecto_fecha_inicio').val(),$('#proyecto_fecha_termino').val());
        // $('#proyecto_duracion_proyecto').val(resta);
    // });

    // Bloqueo el SELECT de las acciones
    $("#id_accion").prop('disabled', true);
   

    if($("#ingresoProyectosForm #proyecto_id_proyecto").val() === '')
    {
        $('#nav-tabs-ficha li').not('.active').addClass('disabled');
    }

    $('#nav-tabs-ficha li').on('click', function(e){
        if($(this).hasClass('disabled'))
        {
            e.preventDefault();
            return false;
        }
    });

    // CONTROL DE EVENTOS PARA FECHAS

    $("#proyecto_fecha_inicio").on("change", function (e)
    {
        var minDate = e.target.value;
        $('#proyecto_fecha_termino').attr("data-after",minDate);
        $('#proyecto_fecha_avance_inf').attr("data-after",minDate);
        $('#proyecto_fecha_fin_inf').attr("data-after",minDate);
        var resta = restaFechas($('#proyecto_fecha_inicio').val(),$('#proyecto_fecha_termino').val());
        $('#proyecto_duracion_proyecto').val(resta);
    });

    $("#proyecto_fecha_termino").on("change", function (e) {
        $('#proyecto_fecha_inicio').attr("data-before",e.target.value);
        var resta = restaFechas($('#proyecto_fecha_inicio').val(),$('#proyecto_fecha_termino').val());
        $('#proyecto_duracion_proyecto').val(resta);
    });


    $("#proyecto_fecha_avance_inf").on("change", function (e) {
        $('#fecha_avance_inf2').removeAttr("readonly");
        var minDate = e.target.value;
        $('#proyecto_fecha_fin_inf').attr("data-after",minDate);
    });

    $("#proyecto_fecha_fin_inf").on("change", function (e) {
        // var fechaFinInf = moment(e.target.value,'DD-MM-YYYY');
        // var fechaTermino = moment($('#proyecto_fecha_termino').val(),'DD-MM-YYYY');
        // if(fechaFinInf.isBefore(fechaTermino))
        // {
        //     $('#proyecto_fecha_inicio').attr("data-before",e.target.value);
        //     $('#proyecto_fecha_termino').attr("data-before",e.target.value);
        // }
        $('#proyecto_fecha_avance_inf').attr("data-before",e.target.value);
    });

// FIN CONTROL DE EVENTOS FECHAS
    $('textarea').maxlength({
        alwaysShow: false,
        threshold: $(this).attr('maxlength')-1,
        separator: ' de ',
        validate: true
    });


    $("#ingresoProyectosForm").submit(function (ev) {
        $('#nav-tabs-ficha li.active').next('li').removeClass('disabled');
        $('#nav-tabs-ficha li.active').next('li').find('a').attr("data-toggle","tab");
    });
});


function restaFechas(f1,f2)
{
    var aFecha1 = f1.split('-');
    var aFecha2 = f2.split('-');
    var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
    var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias+1;
}

function sumarDia(fFecha1)
{
    var fecha = moment(fFecha1,'DD-MM-YYYY');
    fecha.add(1, 'days');
    var respuesta = fecha.date()+"-"+(fecha.month()+1)+"-"+fecha.year();
    return respuesta;
}



function resetBtnsMovimientos() {
    $('#btnEditMovimiento').data('id',"");
    $('#btnDeleteMovimiento').data('id',"");
    $('#btnCalcularOVH').data('id',"");
    $('#btnEditMovimiento').attr('disabled',true);
    $('#btnDeleteMovimiento').attr('disabled',true);
    $('#btnCalcularOVH').hide();
}
