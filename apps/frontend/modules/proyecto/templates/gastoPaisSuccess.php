<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">CARGAR GASTOS</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form id="uploadForm"  enctype="multipart/form-data" method="post" class="form-horizontal">
                <fieldset>
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class="control-group">
                                <label class="control-label" for="id_proyecto">Proyecto:</label></br>
                                <select class="form-control input-sm select2" id="id_proyecto" name="id_proyecto" required="true">
                                    <option></option>
                                    <?php foreach ($listaProyectos as $key => $value): ?>
                                        <option value="<?php echo $key; ?>" <?php echo (isset($idProyecto) && $idProyecto == $key ) ? 'selected' : ''; ?>> <?php echo $key." - ".$value; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-1'>
                            <div class="control-group">
                                <label class="control-label" for="vigente">Vigente:</label></br>
                                <input type="checkbox" name="vigente"  id="vigente" />
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="control-group">
                                <label class="control-label" for="file">Archivo Carga:</label>
                                <input type="file" name="file"  id="file" required="true" accept=".xls" />
                                <?php echo link_to("Descargar Formato", url_for('@descargar_formato'),array('id' => 'linkDescargarFormato', 'target' => '_blank','query_string' => 'doc=formato_gasto_pais.xls')); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="control-group">
                                <button id="btnGuardar" name="btnGuardar" class="btn btn-success">Cargar Información</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    </br>
    </br>
    </br>
    <div id="grilla">
        <?php
            if(isset($idProyecto)):
                include_partial("proyecto/grillaArchivosGastoPais",array('archivos' => $archivosGastoPais,'idProyecto' => $idProyecto));
            endif;
        ?>
    </div>
    </br>
    <div id="alert">
    </div>
</div>
<script>
    $("#id_proyecto").on('change',function(event)
    {
        $('#grilla').html('<?php echo image_tag("gears.gif"); ?>');
        $("#grilla").load('<?php echo url_for("proyecto/grillaGastosPais"); ?>', { id_proyecto : $(this).val() });
    });
</script>