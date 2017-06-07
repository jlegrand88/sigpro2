<!-- Modal Escenario-->
<div class="modal fade" id="popupBitacora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 730px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">Bitacora Proyecto</h4>
            </div>
            <div class="modal-body" style="padding: 30px">
                <div class="alert alert-info">
                    <b>¿Estas seguro de despachar el proyecto?</b>, Ingresa un comentario de bitacora y presiona enviar!
                </div>
                <form id="bitacoraForm" role="form">
                    <div class="form-group">
                        <label for="comentario_pu"></label>
                        <textarea id="comentario_pu" name="comentario_pu" class="form-control input-sm" rows="3"  maxlength="500" placeholder="Ingrese comentario..." required='true'></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#bitacoraForm").submit(function(event) {
        event.preventDefault();
        interruptor = 0;
        $("#observacion").val($("#comentario_pu").val());
        $("#despacharForm").submit();
    });
</script>