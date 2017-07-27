<div class="tab-pane active" id="fichaProyecto">
    <?php $ocultaFicha = false; ?>
    <?php if($permiso == false && $editable == true): ?>
        </br>
        <div class="container">
            <div class="row">
                <div class="alert alert-danger col-lg-12">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php  echo "<strong>".$alerta."</strong>"; ?>
                </div>
            </div>
        </div>
        <?php $ocultaFicha = true; ?>
    <?php endif; ?>
    <div id="fichaContent" <?php echo ($ocultaFicha)?"style='display:none;'":""; ?>>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FICHA DE PROYECTOS</h1>
            </div>
        </div>
        <div>
            <?php if(isset($alertaSuccess) && !empty($alertaSuccess)): ?>
                <div id="content_alert_accion" class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <b><span><?php echo $alertaSuccess; ?></span></b>
                </div>
            <?php endif; ?>
            <?php if($form->hasErrors()): ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        <?php foreach($form->getWidgetSchema()->getPositions() as $widgetName): ?>
                            <?php if($form[$widgetName]->hasError()): ?>
                                <li><?php echo $form[$widgetName]->renderLabelName().' '.$form[$widgetName]->getError(); ?></li>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="container" style="margin-left: 0px;margin-right: 0px;">
                <form id="ingresoProyectosForm"  enctype="multipart/form-data" method="post" class="form-horizontal">
                    <fieldset>
                        <?php echo $form->renderHiddenFields(); ?>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <?php
                                echo $form['vigente']->renderLabel();
                                echo $form['vigente']->render(array('class' => 'form-control input-sm select2','required' => 'true'));
                                ?>
                            </div>
                        </div>
                        <legend>TITULOS</legend>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['titulo']->renderLabel();
                                echo $form['titulo']->render(array('class' => 'form-control input-sm','rows' => '3','required' => 'true'));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['titulo_ing']->renderLabel();
                                echo $form['titulo_ing']->render(array('class' => 'form-control input-sm','rows' => '3'));
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <br><br>
                    <fieldset>
                        <legend>EQUIPO</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['id_grupo_proyecto']->renderLabel();
                                echo $form['id_grupo_proyecto']->render(array('class' => 'form-control input-sm select2','required' => 'true'));
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <div class='form-group'>
                                    <?php
                                    echo $form['usuarios_proyecto_grupo_list']->renderLabel();
                                    echo $form['usuarios_proyecto_grupo_list']->render(array('class' => 'form-control input-sm select2','required' => 'true'));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br><br>
                    <?php
                    if(in_array(2, $sf_data->getRaw('permisosUsuario'))):
                        $blockAdministrativo = "";
                    else:
                        $blockAdministrativo = 'readonly';
                    endif;
                    ?>
                    <fieldset>
                        <legend>ADMINISTRATIVO</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['numero_contable'] ->renderLabel();
                                echo $form['numero_contable']->render(array('class' => 'form-control input-sm', 'type' => "number", 'readonly' => $blockAdministrativo));
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['nombre_contrato'] ->renderLabel();
                                echo $form['nombre_contrato']->render(array('class' => 'form-control input-sm', 'required' => 'true', 'size' => '150','readonly' => $blockAdministrativo));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='col-sm-4'>
                                <?php
                                echo $form['sigla_contable'] ->renderLabel();
                                echo $form['sigla_contable']->render(array('class' => 'form-control input-sm','required' => 'true', 'size' => '150','readonly' => $blockAdministrativo));
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['nombre_proyecto_resum']->renderLabel();
                                echo $form['nombre_proyecto_resum']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'size' => "30", 'readonly' => $blockAdministrativo ) );
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <br><br>
                    <fieldset>
                        <legend>INFORMACION DONANTE</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['donante']->renderLabel();
                                echo $form['donante']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'size' => "30" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['contraparte']->renderLabel();
                                echo $form['contraparte']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'size' => "30" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['correo_contraparte']->renderLabel();
                                echo $form['correo_contraparte']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'size' => "30", 'type' => 'email' ) );
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <br><br>
                    <fieldset>
                        <legend>PLAZOS DEL PROYECTO</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php echo $form['fecha_inicio']->renderLabel(); ?>
                                <?php echo $form['fecha_inicio']->render( array( 'class' => 'form-control input-sm', 'size' => "30" ) ); ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php echo $form['fecha_termino']->renderLabel(); ?>
                                <?php echo $form['fecha_termino']->render( array( 'class' => 'form-control input-sm', 'size' => "30" ) ); ?>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['id_tipo_control_tec']->renderLabel();
                                echo $form['id_tipo_control_tec']->render( array( 'class' => 'form-control input-sm select2', 'required' => "true" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php echo $form['fecha_avance_inf']->renderLabel(); ?>
                                <?php echo $form['fecha_avance_inf']->render( array( 'class' => 'form-control input-sm', 'size' => "30", 'required' => "true" ) ); ?>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['id_tipo_control_fin']->renderLabel();
                                echo $form['id_tipo_control_fin']->render( array( 'class' => 'form-control input-sm select2', 'required' => "true" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php echo $form['fecha_fin_inf']->renderLabel(); ?>
                                <?php echo $form['fecha_fin_inf']->render( array( 'class' => 'form-control input-sm', 'size' => "30", 'required' => "true" ) ); ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php echo $form['fecha_firma_contrato'] ->renderLabel(); ?>
                                <?php echo $form['fecha_firma_contrato']->render(array('class' => 'form-control input-sm','required' => 'true', 'size' => '30','readonly' => $blockAdministrativo)); ?>
                            </div>
                        </div>
                        <br><br>
                    </fieldset>
                    <fieldset>
                        <legend>Contrato o Convenio</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php echo $form['archivo_contrato']['archivo']->render(); ?>
                            </div>
                        </div>
                        </br>
                        <div id="archivosContratoContainer">
                            <?php
                            if($archivosContrato)
                            {
                                echo include_partial('proyecto/tablaArchivosContrato',array('archivosContrato' => $archivosContrato));
                            }
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>PRESUPUESTO</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                    echo $form['id_moneda']->renderLabel();
                                    echo $form['id_moneda']->render( array( 'class' => 'form-control input-sm select2', 'required' => "true" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                    echo $form['overhead_autorizado']->renderLabel();
                                    echo $form['overhead_autorizado']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'min' => "0.00", 'max' => "17.00", 'type' => "number", 'step' => "any" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                    echo $form['monto_total']->renderLabel();
                                    echo $form['monto_total']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'type' => "number", 'size' => "30", 'step' => "any" ) );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='col-sm-4'>
                                <?php
                                    echo $form['recupera_costo']->renderLabel();
                                    echo $form['recupera_costo']->render( array( 'class' => 'form-control input-sm', 'required' => "true", 'type' => "number", 'size' => "30", 'step' => "any" ) );
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>PAISES</legend>
                        <div class='form-group'>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['id_pais']->renderLabel();
                                echo $form['id_pais']->render( array( 'class' => 'form-control input-sm select2', 'required' => "true" ) );
                                ?>
                            </div>
                            <div class='col-sm-4'>
                                <?php
                                echo $form['id_pais_ejecuta']->renderLabel();
                                echo $form['id_pais_ejecuta']->render( array( 'class' => 'form-control input-sm select2', 'required' => "true" ) );
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>CONTENIDO</legend>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['descr_proyecto']->renderLabel();
                                echo $form['descr_proyecto']->render( array( 'class' => 'form-control input-sm', 'rows' => "3", 'required' => "true" ) );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['descr_proyecto_ing']->renderLabel();
                                echo $form['descr_proyecto_ing']->render( array( 'class' => 'form-control input-sm', 'rows' => "3", 'required' => "true" ) );
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['objetivo']->renderLabel();
                                echo $form['objetivo']->render( array( 'class' => 'form-control input-sm', 'rows' => "3", 'required' => "true" ) );
                                ?>
                            </div>
                        </div>
                        <legend>BUSCAR POR</legend>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php
                                echo $form['frases_claves']->renderLabel();
                                echo $form['frases_claves']->render( array( 'class' => 'form-control input-sm', 'rows' => "3", 'required' => "true" ) );
                                ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button id="button1id" name="button1id" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>