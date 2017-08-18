<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SIGPRO Admin Interface</title>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php use_stylesheet('admin.css') ?>
        <?php include_javascripts() ?>
        <?php include_stylesheets() ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <a href="<?php echo $sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().DIRECTORY_SEPARATOR.'index.php'.DIRECTORY_SEPARATOR.'usuario'.DIRECTORY_SEPARATOR.'bandejaEntrada'; ?>">
                        <img src="/images/rimisp-logo_270_180.png" alt="Sigpro" />
                    </a>
                </h1>
            </div>

            <div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
                <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                    <li aria-controls="tabs-1" role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Usuario', 'usuario'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Tipo Movimiento', 'tipo_movimiento'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Tipo Control Proyecto', 'tipo_control_proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Territorio', 'territorio'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Reporte General Proyecto', 'rpt_general_proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('Proyecto Respaldo', 'proyecto_respaldo'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('proyecto_grupo', 'proyecto_grupo'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('proyecto_ambito', 'proyecto_ambito'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('proyecto', 'proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('proveedor', 'proveedor'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('presupuesto_respaldo', 'presupuesto_respaldo'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('presupuesto', 'presupuesto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('perfil_accion', 'perfil_accion'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('perfil', 'perfil'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('parametro', 'parametro'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('pais_territorio', 'pais_territorio'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('pais', 'pais'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('orden_pago', 'orden_pago'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('movimientos_contables', 'movimientos_contables'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('moneda', 'moneda'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('informe_proyecto', 'informe_proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('inbox', 'inbox'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('grupo_proyecto', 'grupo_proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('grupo', 'grupo'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('gasto_pais', 'gasto_pais'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('folio', 'folio'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('estado_proyecto', 'estado_proyecto'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('detalle_orden_pago', 'detalle_orden_pago'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('bitacora', 'bitacora'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('archivos_adjuntos', 'archivos_adjuntos'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('archivo_orden_pago', 'archivo_orden_pago'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('archivo_gasto_pais', 'archivo_gasto_pais'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('ambito_tematico', 'ambito_tematico'); ?></li>
                    <li role="tab" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><?php echo link_to('accion', 'accion'); ?></li>
                </ul>
            </div>

            <div id="content">
                <?php echo $sf_content ?>
            </div>

            <div id="footer">
                powered by
                <a href="/">
                    <img src="/images/symfony.gif" alt="symfony framework" />
                </a></br>Developer: javier.legrand@gmail.com
            </div>
        </div>
    </body>
</html>