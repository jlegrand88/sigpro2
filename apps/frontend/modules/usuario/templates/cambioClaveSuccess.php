<BR class="container">
    </BR>
    <div class="row">
        <div class="col-md-3 ">
        </div>
        <div class="col-md-6 ">
            <?php if(isset($alerta)): ?>
                <div class="row">
                    <div class="<?php echo $tipoAlerta; ?>">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php  echo "<strong>".$alerta."</strong>"; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cambiar Contraseña</h3>
                    </div>
                    <div class="panel-body">
                        <form id="cambioPasswordForm" action="<?php echo url_for('usuario/cambioClave'); ?>" style="margin: 30px;" method="post" class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="text">Contraseña Actual</label>
                                    <input class="form-control" placeholder="" name="passwordActual" type="password" autofocus required="true">
                                </div>
                                <div class="form-group">
                                    <label for="text">Contraseña Nueva</label>
                                    <input class="form-control" placeholder="" name="nuevaPassword" type="password" required="true">
                                </div>
                                <div class="tab-content">
                                    <!--<button href="#" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>-->
                                    <button id="button1id" name="button1id" class="btn btn-success">Guardar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
        </div>
    </div>
</div>