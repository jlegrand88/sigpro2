<?php if(isset($proyecto) && $proyecto->getIdProyecto()): ?>
    <div class="tab-pane" id="presupuesto">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Presupuestos</h1> </div>
        </div>
            <?php
            if(isset($accionUsuario)  && in_array($accionUsuario, array(Accion::MANTENER, Accion::CREAR, Accion::CONTABILIZAR)) || $proyecto->getIdCreador() == $sf_user->getAttribute('id') && $editable != 0):
                if($proyecto->getFechaInicio() && $proyecto->getFechaTermino()):
                    $fechaInicioAlerta = new DateTime($proyecto->getFechaInicio());
                    $fechaTerminoAlerta = new DateTime($proyecto->getFechaTermino());
                    ?>
                    <div class="container row">
                        <div class="alert alert-info col-md-6">
                            <?php  echo "<b>Monto Total</b>: ".$proyecto->getMontoTotal()."</br> <b>Fecha Inicio</b>: ".$fechaInicioAlerta->format('d-m-Y')."</br><b>Fecha Termino</b>: ".$fechaTerminoAlerta->format('d-m-Y'); ?>
                        </div>
                    </div>
                    <div class="container row">
                        <div id="detallePpto" class="alert alert-info col-md-6"></div>
                    </div>
                <?php endif; ?>
                <?php if(in_array($accionUsuario,array(Accion::CONTABILIZAR, Accion::MANTENER)) && $editable != 0 || $proyecto->getIdCreador() == $sf_user->getAttribute('id') && $editable != 0): ?>
                    <div class='container row'>
                        <div class="col-md-12">
                            <div class="row">
                                <span class="text-danger">(*) Para activar los botones de editar, eliminar o calcular primero debe seleccionar una fila de la grilla de movimientos.</span>
                            </div>
                            <div class="row">
                                <button id="btnAddMovimiento" href="#movimientoModal" class="btn btn-success" data-toggle="modal">Agregar Movimiento</button>
                                <button id="btnEditMovimiento" href="#movimientoModal" class="btn btn-primary" data-toggle="modal" disabled="true">Editar Movimiento</button>
                                <button id="btnCalcularOVH" href="<?php echo url_for('proyecto/calcularOverhead') ?>" class="btn btn-warning" style="display:none">Calcular Overhead</button>
                                <button id="btnDeleteMovimiento" href="<?php echo url_for('proyecto/deleteMovimiento') ?>" disabled="true" class="btn btn-danger">Eliminar Movimiento</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            </br>
            <div id="alertDeleteMovimiento" class="alert alert-danger col-md-6" hidden>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span>Movimiento Eliminado.</span>
            </div>
            <div id="alertUpdateMovimiento" class="alert alert-success col-md-6" hidden>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span>Movimiento Actualizado.</span>
            </div>
            <div id="alertCalculoMovimiento" class="alert alert-success col-md-6" hidden>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span>Overhead actualizado.</span>
            </div>
            </br>
            <div id="tablaMovimientosContainer" style="padding: 0px !important; width: 100% !important;">
                <?php include_partial('tablaMovimientos', array('proyecto' => $proyecto, 'editable' => $editable, 'accionUsuario' => $accionUsuario, 'movimientos' => $movimientos)); ?>
            </div>
            </BR>
            <div id="alertPpto"></div>
    </div>
<?php endif; ?>

<!-- Modal HTML -->
<div id="movimientoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" id="movimientoForm">
                <div id="movimientoModalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button id="btnCloseMovimientoForm" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div>

<script>
    function loadGrillaMovimientos(alert){
        $("#tablaMovimientosContainer").load('<?php echo url_for('proyecto/loadTablaMovimientos'); ?>',{idProyecto : $("#ingresoProyectosForm #proyecto_id_proyecto").val(),au : <?php echo $accionUsuario; ?>},
            function (responseTxt, statusTxt, xhr) {
                if(alert)
                {
                    $('#'+alert).show();
                }
        });
    }

    $("#btnAddMovimiento").click(function (event) {
        $("#movimientoModalBody").load(
            <?php echo "'".url_for('proyecto/loadMovimientoForm')."'"; ?>,
            {
                idProyecto :  $("#ingresoProyectosForm #proyecto_id_proyecto").val()
            }
        );
    });
    
    $("#btnEditMovimiento").click(function (event) {
        $("#movimientoModalBody").load(
            <?php echo "'".url_for('proyecto/loadMovimientoForm')."'"; ?>,
            {
                idPresupuesto :  $("#btnEditMovimiento").data('id')
            }
        );
    });

    $('#movimientoForm').submit(function (event) {
        event.preventDefault();
        var fields  = $("#movimientoForm").serialize();
        $.post("<?php echo url_for('proyecto/procesaMovimientoForm') ?>", fields ,
            function(data) {
                $("#movimientoModalBody").html(data);
                loadGrillaMovimientos();
                resetBtnsMovimientos();
                $('#detallePpto').load("<?php echo url_for('proyecto/detallePpto');?>", { id : $("#ingresoProyectosForm #proyecto_id_proyecto").val()});
            });
    });

    $("#btnDeleteMovimiento").click(function (event) {
        $.post("<?php echo url_for('proyecto/deleteMovimiento') ?>", { idPresupuesto : $("#btnDeleteMovimiento").data('id') },
            function() {
                loadGrillaMovimientos('alertDeleteMovimiento');
                resetBtnsMovimientos();
                $('#detallePpto').load("<?php echo url_for('proyecto/detallePpto');?>", { id : $("#ingresoProyectosForm #proyecto_id_proyecto").val()});
            });
    });

    $("#btnCalcularOVH").click(function (event) {
        $.post("<?php echo url_for('proyecto/calcularOverhead') ?>", { idProyecto : $("#ingresoProyectosForm #proyecto_id_proyecto").val(), idPresupuesto : $("#btnCalcularOVH").data('id') },
            function() {
                loadGrillaMovimientos('alertCalculoMovimiento');
                resetBtnsMovimientos();
                $('#detallePpto').load("<?php echo url_for('proyecto/detallePpto');?>", { id : $("#ingresoProyectosForm #proyecto_id_proyecto").val()});
        });
    });

    $('#movimientoModal').on('hidden.bs.modal', function () {
        $("#movimientoModalBody").html("");
    });

    $().ready(function () {
        $('#detallePpto').load("<?php echo url_for('proyecto/detallePpto');?>", { id : $("#ingresoProyectosForm #proyecto_id_proyecto").val()});
    });
</script>