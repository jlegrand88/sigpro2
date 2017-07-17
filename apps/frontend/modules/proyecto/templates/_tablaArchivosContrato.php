<?php if(count($archivosContrato) > 0): ?>
    <table class='table table-striped table-bordered table-hover' style='width: 50%;'>
        <tr>
            <td>Archivo</td>
            <td>Fecha Upload</td>
            <td></td>
        </tr>
        <?php foreach ($archivosContrato as $archivo): ?>
            <tr>
                <td>
                    <?php $ruta = sfConfig::get('app_ruta_documentos_orden_pago'); ?>
                    <a target="_blank" href="/uploads/documentos/contratos_o_convenios/<?php echo $archivo->getArchivo(); ?>"><?php echo $archivo->getNombre(); ?></a>
                </td>
                <td><?php echo DateTime::createFromFormat('Y-m-d H:i:s',$archivo->getFecha())->format('d-m-Y H:i:s'); ?></td>
                <td>
                    <button class='btn btn-danger eliminarArchivoContrato' data-id='<?php echo $archivo->getIdArchivoContrato(); ?>' >Eliminar</button>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<script>
    $(document).ready(function (e) {
        $('.eliminarArchivoContrato').on('click',function (e) {
            $('#archivosContratoContainer').html('<?php echo image_tag("gears.gif"); ?>');
            $("#archivosContratoContainer").load(
                "<?php echo url_for('proyecto/eliminarArchivoContrato'); ?>",
                { 'id' : $(this).data('id') }
            );
            e.preventDefault();
        });
    });
</script>