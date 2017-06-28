<div class="tab-pane" id="despachar">
    <div class="container" style="margin-left: 0px;margin-right: 0px;">
        <form id="despacharForm" class="form-horizontal">
            <input type="hidden" id="id_proyecto" name="id_proyecto" />
            <input type="hidden" id="id_orden_pago" name="id_orden_pago" />
            <input type="hidden" id="id_inbox" name="id_inbox" value="<?php  echo (isset($idInbox) ? $idInbox : ''); ?>" />
            <input type="hidden" id="id_tipo_documento" name="id_tipo_documento" value="<?php  echo $tipoDocumento; ?>" />
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
                </div>
            </fieldset>
            <div class="form-group">
                <label class="col-md-3 control-label" for="btnDespachar"></label>
                <div class="col-md-8">
                    <div class="row">
                        <button id="btnDespachar" name="btnDespachar" class="btn btn-success">Despachar</button>
                        <?php echo image_tag('loading.gif',array('id'=>'outgoing','hidden'=>'true')); ?>
                    </div>
                </div>
            </div>
        </form>
        </br>
    </div>
</div>

<script>
//    $().ready(function () {
//
//    });
    $("#despacharForm").submit(function(event)
    {
        event.preventDefault();
        $('#btnDespachar').attr('disabled',true);
        $('#outgoing').show();
        $.ajax({
            type : 'POST',
            url : "<?php echo url_for('proyecto/despacharOrden'); ?>",
            data  : $("#despacharForm").serializeArray(),
            datatype : 'html',
            success: function() {
                window.location.replace("<?php echo url_for('usuario/bandejaEntrada'); ?>");
            }
        });
    });
</script>