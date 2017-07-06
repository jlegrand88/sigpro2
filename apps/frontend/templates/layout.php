<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header navbar-collapse collapse">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SIGPRO</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i><i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>Proyecto Rural 1</strong>
                                        <span class="pull-right text-muted">
                                            <em>06-11-2015</em>
                                        </span>
                                    </div>
                                    <div>Se acerca la fecha de termino  del proyecto FIE</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>Proyecto Rural 2</strong>
                                        <span class="pull-right text-muted">
                                            <em>16-11-2015</em>
                                        </span>
                                    </div>
                                    <div>Se contabilizo el proyecto ODEP20</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Ver Todos los Mensajes</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo $sf_user->getAttribute('nombreCompleto'); ?> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ path( 'cambioClave' ) }}">
                                    <i class="fa fa-gear fa-fw"></i> Cambio Contraseña
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?php echo link_to("<i class='fa fa-sign-out fa-fw'></i> Salir", url_for('@user_logout')); ?>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                              <!-- /input-group -->
                            </li>
                            <li>
                                <?php echo link_to("<i class=\"fa fa-edit fa-fw\"></i> Bandeja de Entrada", url_for('@bandeja_entrada'),array('id' => 'linkBandejaEntrada')); ?>
                            </li>
                            <li>
                                <?php echo link_to("<i class=\"fa fa-edit fa-fw\"></i> Bandeja de Salida", url_for('@bandeja_salida'),array('id' => 'linkBandejaSalida')); ?>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open"></i> Documentos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?php echo link_to("<i class=\"fa fa-edit fa-fw\"></i> Ficha de Proyectos", url_for('@ingreso_proyecto'),array('id' => 'linkIngresoProyectos')); ?>
                                    </li>
                                    <li>
                                        <?php echo link_to("<i class='fa fa-edit fa-fw'></i> Ordenes de Pago", url_for('@orden_pago'),array('id' => 'linkOrdenPago','query_string' => 'opcion=1',)); ?>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <?php echo link_to("<i class='fa fa-table fa-fw'></i> Reportes", url_for('@reporte_informes'),array('id' => 'linkReporteInformes','query_string' => 'opcion=1',)); ?>
                            </li>
                            <li>
                                <?php echo link_to("<i class='fa fa-table fa-cubes'></i> Gastos Otros Paises", url_for('@gasto_pais'),array('id' => 'linkGastosOtrosPaises','query_string' => '',)); ?>
                            </li>
<!--                            <li>-->
<!--                                --><?php //echo link_to("<i class='fa fa-table fa-refresh'></i> Movimientos Contables", url_for('proyecto/movimientosContables'),array('id' => 'linkMovimientosContables','query_string' => '',)); ?>
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Mantenedores<span class="fa arrow"></span></a>-->
<!--                                <ul class="nav nav-second-level">-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'reasignarFichas' ) }}">Reasignar Fichas</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'usuario' ) }}">Usuarios</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'grupo' ) }}">Grupo</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'proveedores' ) }}">Proveedores</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'moneda' ) }}">Moneda</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="{{ path( 'paises' ) }}">Paises</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <?php if($sf_user->getAttribute('perfil') == Perfil::CONTADOR): ?>
                                <li>
                                    <a id='linkAdministracion' href="<?php echo $sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().DIRECTORY_SEPARATOR.'backend.php'; ?>"><i class="fa fa-wrench fa-fw"></i>Administración</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <?php echo $sf_content ?>
            </div>
        </div>
    <!-- /#wrapper -->
    </body>
</html>