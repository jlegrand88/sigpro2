<?php if(count($ordenPago->getArchivoOrdenPago()) > 0): ?>
    <table class='table table-striped table-bordered table-hover' style='width: 50%;'>
        <tr>
            <td>Archivo</td>
            <td>Fecha Upload</td>
            <td></td>
        </tr>
        <?php foreach ($ordenPago->getArchivoOrdenPago() as $archivo): ?>
                <tr>
                    <td>
                        <?php $ruta = '/uploads/documentos/'.$ordenPago->getIdProyecto().DIRECTORY_SEPARATOR.$ordenPago->getIdOrdenPago().DIRECTORY_SEPARATOR.$archivo->getArchivo(); ?>
                        <a target="_blank" href="<?php echo $ruta; ?>"><?php echo $archivo->getNombre(); ?></a>
                    </td>
                    <td><?php echo DateTime::createFromFormat('Y-m-d',$archivo->getFechaUpload())->format('d-m-Y'); ?></td>
                    <td>
                        <?php if(isset($idDeleteArchivo) && $idDeleteArchivo == $archivo->getIdArchivoOrdenPago()): ?>
                            <button class='btn btn-danger eliminarArchivoOrdenPago' data-id='<?php echo $archivo->getIdArchivoOrdenPago(); ?>' >Eliminar</button>
                        <?php endif; ?>
                    </td>

                </tr>
        <?php endforeach; ?>
</table>
<?php endif; ?>
<script>
    $(document).ready(function (e) {
        $('.eliminarArchivoOrdenPago').on('click',function (e) {
            $('#documentosOrdenPagoContainer').html('<?php echo image_tag("gears.gif"); ?>');
            $("#documentosOrdenPagoContainer").load(
                "<?php echo url_for('proyecto/eliminarArchivoOrdenPago'); ?>",
                { 'id' : $(this).data('id') }
            );
            e.preventDefault();
        });
    });
</script>