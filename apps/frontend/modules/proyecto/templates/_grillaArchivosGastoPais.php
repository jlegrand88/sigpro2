<h1 class="page-header">Archivos Cargados</h1>
<table width=""  class="table  table-striped table-bordered table-hover" id="grillaArchivosGastoPais"  data-toggle="table"></table>

<script type="text/javascript">
    $(document).ready(function (e) {
        var data = [];
        <?php foreach($archivos as $archivo): ?>
            data.push({
                0 : <?php echo json_encode($archivo->getNombre()); ?>,
                1 : <?php echo json_encode($archivo->getRuta());?>,
                2 : '<?php echo DateTime::createFromFormat('Y-m-d H:i:s',$archivo->getFecha())->format('d-m-Y H:i:s'); ?>',
                3 : '<?php echo ($archivo->getVigente()) ? 'Si' : 'No'; ?>',
                4 : <?php echo json_encode("<button class='eliminarArchivo btn btn-danger' data-id='".$archivo->getIdArchivoGastoPais()."' >Eliminar</button>");?>,
            });
        <?php endforeach; ?>
        var table = $('#grillaArchivosGastoPais').DataTable({
            language: spanish,
//            select : {style: 'single',items: 'row'},
            data : data,
            columns:[
                {data: 0, title: 'Nombre Archivo'},
                {data: 1, title: 'Ruta'},
                {data: 2, title: 'Fecha'},
                {data: 3, title: 'Vigente'},
                {data: 4, title: 'Eliminar'},
            ],
            columnDefs:[{targets: [0,4], searchable: true}]
        });
        new $.fn.dataTable.FixedHeader(table);
        
        $('.eliminarArchivo').click(function (){
            var action = confirm('¿Está seguro de eliminar el archivo?');
            if(action===true)
            {
                var id = $(this).data('id');
                var idProyecto = <?php echo $idProyecto; ?>;
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url_for('proyecto/eliminarArchivogastoPais'); ?>",
                    data  : { "id" : id },
                    datatype : 'html',
                    beforeSend: function(){
                        $('#grilla').html('<?php echo image_tag("gears.gif"); ?>');
                    },
                    success: function() {
                       $("#grilla").load('<?php echo url_for("proyecto/grillaGastosPais"); ?>', { id_proyecto : idProyecto });
                    }
                });
            }
        });
    });
</script>