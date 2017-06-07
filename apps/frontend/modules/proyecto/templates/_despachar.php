<div class="tab-pane" id="despachar">
    <div class="container" style="margin-left: 0px;margin-right: 0px;">
        <?php if(isset($accionUsuario) && isset($accionUsuarioPregunta)): ?>
            <?php if($proyecto->getIdEstadoProyecto() == $accionEstadoFinal):
                    $show = true;
                else:
                    $show = false;
                endif;
            ?>
            </br>
            <div id="divAccionEjecutada" class="alert alert-success" <?php echo ($show == false)?'style="display:none;"':''; ?>>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo 'El proyecto se encuentra '.$proyecto->getEstadoProyecto()->getDescripcion(); ?>
            </div>

            <div id="divEjecutarAccion" <?php echo ($show == true)?'style="display:none;"':''; ?>>
                <h1><small><p class="text-center"><?php echo utf8_decode($accionUsuarioPregunta); ?></p></small></h1>
                <p class="text-center"><button id="ejecutarAccion" name="ejecutarAccion" class="btn btn-success"><?php echo (isset($lblAccion)?$lblAccion:'Aceptar');?></button></p>
            </div>
        <?php endif; ?>

        <form id="despacharForm" class="form-horizontal">
            <input type="hidden" id="id_proyecto" name="id_proyecto" value="<?php  echo (isset($proyecto) ? $proyecto->getIdProyecto() : ''); ?>" />
            <input type="hidden" id="id_inbox" name="id_inbox" value="<?php  echo (isset($idInbox) ? $idInbox : ''); ?>" />
            <input type="hidden" id="observacion" name="observacion"/>
            <input type="hidden" id="accion_usuario" name="accion_usuario" value="<?php echo (isset($accionUsuario) ? $accionUsuario : ''); ?>" />
            <fieldset>
                <legend>Despachar a</legend>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='form-group'>
                            <label for="id_destinatario">Seleccione Destinatario</label></br>
                            <select class="form-control input-sm select2" id="id_destinatario" name="id_destinatario" style="width: 390px;" required="true">
                                <option></option>
                                <?php foreach ($listaUsuarios as $key => $value): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class='form-group'>
                            <label for="id_accion">Accion </label>
                            <select class="form-control input-sm" id="id_accion" name="id_accion">
                            </select>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label class="col-md-3 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Despachar</button>
                </div>
            </div>
        </form>
        </br>
    </div>
</div>

<script>

    $().ready(function () {
        interruptor = 1;
    });
    

    $("#despacharForm").submit(function(event)
    {
        if(interruptor)
        {
            event.preventDefault();
            $('#popupBitacora').modal('show');
        }
        else
        {
            event.preventDefault();
            $.ajax({
                type : 'POST',
                url : "<?php echo url_for('proyecto/despacharProyecto'); ?>",
                data  : $("#despacharForm").serializeArray(),
                datatype : 'html',
                success: function() {
                    window.location.replace("<?php echo url_for('usuario/bandejaEntrada'); ?>");
                }
            });
        }
    });

    $('#ejecutarAccion').click(function (event){
        $.ajax({
            type : 'POST',
            url : "<?php echo url_for('proyecto/ejecutarAccionUsuario'); ?>",
            data  : { "idAccion" : <?php echo (isset($accionUsuario) ? $accionUsuario : ''); ?>, "idProyecto" : $("#ingresoProyectosForm #proyecto_id_proyecto").val()},
            datatype : 'html',
            success: function(response) {
                $("#divEjecutarAccion").hide();
                $("#divAccionEjecutada").text(jQuery.parseJSON(response));
                $("#divAccionEjecutada").show();
            }
        });
    });

    $("#id_destinatario").change(function()
    {
        var  acciones = $("#id_accion");
        var destinatario = $(this);

        if($(this).val() !== '')
        {
            $.ajax({
                data: { id_destinatario : destinatario.val() },
                url:   '<?php echo url_for("usuario/accionesUsuario"); ?>',
                type:  'POST',
                dataType: 'json',
                beforeSend: function ()
                {
                    destinatario.prop('disabled', true);
                },
                success:  function (r)
                {
                    destinatario.prop('disabled', false);

                    // Limpiamos el select
                    acciones.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        acciones.append('<option value="' + v.id_accion + '">' + v.nombre + '</option>');
                    })

                    acciones.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    destinatario.prop('disabled', false);
                }
            });
        }
        else
        {
            acciones.find('option').remove();
            acciones.prop('disabled', true);
        }
    });
</script>