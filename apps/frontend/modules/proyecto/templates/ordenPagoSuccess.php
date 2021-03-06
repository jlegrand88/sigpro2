
<ul class="nav nav-tabs col-lg-12" id="nav-tabs-ficha" style="padding-left: 15px;">
    <li class="active">
        <a href="#ordenPago" data-toggle="tab">Orden de Pago</a>
    </li>
    <li <?php echo (isset($ordenCompra) ? "" : "class='disabled'"); ?> >
        <a href="#despachar"  data-toggle="tab">Despachar</a>
    </li>
</ul>
<div class="tab-content col-lg-12">
    <!-- TAB ORDEN DE PAGO-->
    <div class="tab-pane active" id="ordenPago">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ORDENES DE PAGO</h1>
                </div>
            </div>
            <div >
                <!-- SELECT PROYECTO-->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="idProyecto">Seleccione Proyecto</label>
                        <select class="form-control input-sm select2" id="idProyecto" name="idProyecto" required="true">
                            <option></option>
                            <?php foreach ($listaProyectos as $key => $value):?>
                                <option value="<?php echo $key;?>" <?php echo (isset($idProyecto) && $idProyecto == $key) ? "selected = 'selected'" : ""?>>
                                    <?php echo $value; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="container col-sm-3">
                        <div class="alert alert-info" id="container_moneda_proyecto" hidden>
                        </div>
                    </div>
                    <div class="container col-sm-3">
                        <?php if( isset($ordenPago) ): ?>
                            <?php echo link_to("Descargar ODP", url_for('proyecto/descargarODP'),array('id' => 'link_descargar_odp','query_string' => 'id='.$ordenPago->getIdOrdenPago(),'target' => '_blank','class' => 'btn btn-warning' )); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- ALERTAS-->
                <?php if($sf_user->hasFlash('success')): ?>
                    <div id="content_alert_accion" class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <b><span><?php echo $sf_user->getFlash('success'); ?></span></b>
                    </div>
                <?php endif; ?>
<!--                FORMULARIO ORDEN PAGO-->
                <div class='row'>
                    <div id="containerOrdenPagoForm">
                        <?php
                            if(isset($form)){
                                include_partial('proyecto/ordenPagoForm',array('form' => $form, 'editable' => $editable, 'ordenPago' => $ordenPago, 'idDeleteArchivo' => $idDeleteArchivo, 'idUsuario' => $idUsuario));
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TAB DESPACHAR-->
    <?php include_partial('proyecto/despacharOrden', array('listaUsuarios' => $listaUsuarios, 'idInbox' => $idInbox, 'tipoDocumento' => $tipoDocumento)); ?>
</div>

<script type="text/javascript">
    $( document ).ready(function()
    {
        $('.select2').select2({
            placeholder: "Seleccione"
        });
        $("input:text").attr('maxlength','45');

        $('#nav-tabs-ficha li').on('click', function(e)
        {
            if($(this).hasClass('disabled'))
            {
                e.preventDefault();
                return false;
            }
        });
        $('#despacharForm #id_proyecto').val($('#idProyecto').val());
        $('#despacharForm #id_orden_pago').val(<?php echo ($ordenPago) ? $ordenPago->getIdOrdenPago() : ""; ?>);
        if($('#idProyecto').val())
        {
            $('#container_moneda_proyecto').load("<?php echo url_for('proyecto/getMonedaProyecto'); ?>",{ id_proyecto : $('#idProyecto').val() });
            $('#container_moneda_proyecto').show();
        }
    });

    

    $('#idProyecto').on('change',function (event) 
    {
        $('#container_moneda_proyecto').load("<?php echo url_for('proyecto/getMonedaProyecto'); ?>",{id_proyecto:$(this).val()});
        $('#container_moneda_proyecto').show();
        $('#containerOrdenPagoForm').html('<?php echo image_tag("gears.gif"); ?>');
        $('#containerOrdenPagoForm').load(
            "<?php echo url_for('proyecto/loadOrdenPagoForm'); ?>",
            { id_proyecto : $(this).val() }
        );
        $('#despacharForm #id_proyecto').val($(this).val());
    });

    
    

<!--    --><?php //if(!$editable):?>
    //        $('input').prop('readonly', true);
    //        $('textarea').prop('readonly', true);
    //        $('select').prop('readonly', true);
    //        $('button').attr("disabled", true);
    //        $('.select2').prop("disabled", true);
    //    <?php //endif ;?>
</script>