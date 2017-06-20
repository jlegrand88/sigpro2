<?php
    $globalErrors = false;
    if($form->hasGlobalErrors()){
        $globalErrors = true;
    }
    $errors = array();
    foreach ($form->getErrorSchema() as $key => $err)
    {
        if ($key)
        {
            $errors[$key] = $err->getMessage();
        }
    }
    if($errors || $globalErrors):
?>
        <div class="alert alert-danger">
            <?php echo $form->renderGlobalErrors(); ?>
            </br>
            <?php foreach ($errors as $error):
                    echo $error;
                endforeach;
            ?>
        </div>
<?php endif; ?>
<form enctype="multipart/form-data" class="form-inline" id="ingresoOrdPagoForm" action="<?php echo url_for('proyecto/ordenPago') ?>" method="post" class="form-horizontal">
    <fieldset>
        <?php use_helper('Number'); ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    CUENTAS (<?php echo count($form['detalle_orden_pago']); ?>):
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <?php echo $form->renderHiddenFields(); ?>
                        <table width="" class="table table-striped table-bordered table-hover" id="dataTables-detalleproyecto">
                            <thead>
                                <tr>
                                    <th width="159">N° Cuenta</th>
                                    <th>Descripcion</th>
                                    <th >Presupuesto<br></th>
                                    <th >Ejecucion</th>
                                    <th >Saldo Efectivo</th>
                                    <th >Monto Documento(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumppto=0;
                                $sumejec=0;
                                $sumcompr=0;
                                $iter=0;
                                foreach ($form['detalle_orden_pago'] as $formDetalleOrdenPago): ?>
                                    <tr class="odd gradeX">
        <!--                                CODIGO DE CUENTA-->
                                        <td align=right>
                                            <?php echo $formDetalleOrdenPago['cuenta']->getValue();?>
                                        </td>
        <!--                                DESCRIPCION-->
                                        <td align=right>
                                            <?php echo $formDetalleOrdenPago['nombre_cuenta']->getValue();?>
                                        </td>
        <!--                                PRESUPUESTO-->
                                        <td align=right>
                                            <?php echo number_format($formDetalleOrdenPago['presupuesto']->getValue(), 2, ',', '.');?>
                                        </td>
        <!--                                EJECUCION-->
                                        <td align=right>
                                            <?php echo number_format($formDetalleOrdenPago['ejecucion']->getValue(), 2, ',', '.'); ?>
                                        </td>
        <!--                                SALDO EFECTIVO-->
                                        <td align=right>
                                            <?php echo number_format($formDetalleOrdenPago['saldo_efectivo']->getValue(), 2, ',', '.');?>
                                        </td>
        <!--                                MONTO DOCUMENTO-->
                                        <td align=right>
                                            <?php echo $formDetalleOrdenPago['monto_pago']->render(array('onkeypress' => "return isNumeric(event)", 'oninput' => 'maxLengthCheck(this); validarMontos('.$iter.');', 'min' => "1", 'max' => "999999999999")); ?>
                                        </td>
                                    </tr>
                                    <?php
                                    if ( substr($formDetalleOrdenPago['cuenta']->getValue(), -2) != '01' ):
                                        $sumppto = $sumppto + $formDetalleOrdenPago['presupuesto']->getValue();
                                        $sumejec = $sumejec + $formDetalleOrdenPago['ejecucion']->getValue();
                                        $sumcompr = $sumcompr + $formDetalleOrdenPago['compromiso']->getValue();
                                    endif;
                                    $iter++;
                                endforeach; ?>
                                <tr>
                                    <td>TOTAL GASTOS</td>
                                    <td align=right></td>
                                    <td align=right><?php echo number_format($sumppto,2,',','.')?></td>
                                    <td align=right><?php echo number_format($sumejec,2,',','.')?></td>
                                    <td align=right></td>
                                    <td align=right></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <fieldset>
                        <legend>PROVEEDORES</legend>
                        <div class='row'>
                            <div class='col-sm-6'>
                                <?php
                                    echo $form['rut_proveedor']->renderLabel()."</br>";
                                    echo $form['rut_proveedor']->render();
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    </br>
                    <fieldset>
                        <legend>Archivos Adjuntos</legend>
<!--                        --><?php //foreach($form['archivo_orden_pago'] as $formArchivoOrdenPago): ?>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <?php
                                        echo $form['archivo_orden_pago']['archivo']->render();
                                    ?>
                                </div>
                            </div>
<!--                        --><?php //endforeach; ?>
                    </fieldset>
                    </br>
                    <div id="documentosOrdenPagoContainer">
                        <?php
                            if($ordenPago)
                            {
                                echo include_partial('proyecto/tablaArchivosOrdenPago',array('ordenPago' => $ordenPago,'idDeleteArchivo' => $idDeleteArchivo));
                            }
                        ?>
                    </div>
                    </br>
                    <fieldset>
                        <legend>OBSERVACIONES</legend>
                        <div class='row'>
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <?php
                                        echo $form['bitacora']['observacion']->render();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        </br>
                        <label class="col-md-3 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button id="button1id" name="button1id" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </fieldset>
</form>

<script type="text/javascript">
    $().ready(function ()
    {
        <?php $var = isset($ordenPago); ?>
        var orden = "<?php echo $var ?>";
        if(orden)
        {
            $('#nav-tabs-ficha li.active').next('li').removeClass('disabled');
        }
        else
        {
            $('#nav-tabs-ficha li.active').next('li').addClass('disabled');
        }
        
        $('#orden_pago_rut_proveedor').select2({
            placeholder: "Seleccione"
        });

        $("#ingresoOrdPagoForm").submit(function (e)
        {
            totcat = <?php echo count($form['detalle_orden_pago']); ?>;
            contMontosCero = 0;
            contMontosConValor = 0;

            for (i = 0; i < totcat; i++)
            {
                if ($("#orden_pago_detalle_orden_pago_"+i+"_monto_pago").val() == 0 || $("#orden_pago_detalle_orden_pago_"+i+"_monto_pago").val() == "") {
                    contMontosCero++;
                }
                else {
                    contMontosConValor++;
                }
            }
            if (contMontosCero == totcat && contMontosConValor == 0)
            {
                alert("Atencion \n\n no se han informado gastos en la columna monto de documentos");
                event.preventDefault();
                return false;
            }
        });

        $('textarea').maxlength({
            alwaysShow: false,
            threshold: $(this).attr('maxlength')-1,
//        warningClass: "label label-success",
//        limitReachedClass: "label label-danger",
            separator: ' de ',
//        preText: 'You have ',
//        postText: ' chars remaining.',
            validate: true
        });
    });

//    $('#proyecto_proveedor').on('change',function (e)
//    {
//        var rows = <?php //echo count($form['DetalleOrdenPago']); ?>//;
//        for (i = 0; i < rows; i++) {
//            console.log($(this).val());
//            $('#proyecto_OrdenPago_'+i+'_rut_proveedor').val($(this).val());
//        }
//    });

    function maxLengthCheck(object)
    {
        if (object.value.length > object.max.length) {
            object.value = object.value.slice(0, object.max.length);
        }
    }

    function isNumeric (evt)
    {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) )
        {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function validarMontos(pos)
    {
        var montoDocumento = $("#orden_pago_detalle_orden_pago_"+pos+"_monto_pago").val();
        var presupuesto = $("#orden_pago_detalle_orden_pago_"+pos+"_presupuesto").val();
        var cuenta = $("#orden_pago_detalle_orden_pago_"+pos+"_cuenta").val();
        var saldoEfectivo = $("#orden_pago_detalle_orden_pago_"+pos+"_saldo_efectivo").val();
        console.log(presupuesto);
        console.log(cuenta);
        console.log(parseFloat(saldoEfectivo));
        console.log(parseFloat(montoDocumento));
        if ( parseFloat(montoDocumento) > parseFloat(saldoEfectivo) )
        {
            alert("ATENCION\n\nEn la cuenta "+cuenta+" El monto del documento supera en monto del saldo efectivo\n\n Favor vea la ficha del Proyecto");
            $("#orden_pago_detalle_orden_pago_"+pos+"_monto_pago").val(0);
            return;
        }
    }
</script>