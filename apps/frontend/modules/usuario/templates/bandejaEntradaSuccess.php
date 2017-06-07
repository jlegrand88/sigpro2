<div class="col-lg-12">
    <h1 class="page-header">Bandeja de Entrada</h1>
</div>
<!-- Select Basic -->
<div class="container col-lg-12">
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="glyphicon glyphicon-inbox"></span>
                    Listado <span class="badge"><?php echo $data['countInbox']; ?></span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div id="bandeja" class="list-group">
                    <dl>
                        <?php if ($data['inbox']): ?>
                            <?php foreach($data['inbox'] as $item): ?>
                                <dt>
                                    <div class="list-group-item">
                                        <?php if ($item['idTipoDocumento'] == 1): ?>
                                            <a href="<?php echo url_for('proyecto/ingresoProyecto').'?id_proyecto='.$item['idProyecto'].'&id_inbox='.$item['idInbox']; ?>" class="list-group-item">
                                                <div class="col-lg-10">
                                                    <span class="name" style="min-width: 120px; display: inline-block;">
                                                        <?php  echo $item['numeroContable']." - ".$item['emisor']; ?>
                                                    </span>
                                                    </br>
                                                    <span class="">
                                                        <?php echo utf8_decode($item['nombreProyecto']); ?>
                                                    </span>
                                                </div>
                                                <div class="col-lg-2">
                                                    <span class="pull-right">
                                                        <?php if ($item['fechaRecepcion'] != "0000-00-00" && !empty($item['fechaRecepcion'])): ?>
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                            <span class="badge ">
                                                                <?php echo $item['fechaRecepcion']; ?>
                                                            </span>
                                                            </br>
                                                            <span class="text-muted" style="font-size: 11px; color: green; font-weight: bold;">
                                                                <?php echo $item['estadoProyecto']; ?>
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="glyphicon glyphicon-eye-close"></span>
                                                            <span class="text-muted" style="font-size: 11px; color: green; font-weight: bold;">
                                                                <?php echo $item['estadoProyecto']; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            </a>
                                        <?php else: ?>
<!--                                            <a href="{{ path( 'ordenesPagos', { 'idProyecto' : item['idProyecto'], 'ib' : item['idInbox'], 'id_folio' : item['folio'], 'opcion' : 2 } ) }}" class="list-group-item">-->
                                            <a href="<?php echo url_for('proyecto/ordenPago').'?id_proyecto='.$item['idProyecto'].'&id_inbox='.$item['idInbox'].'&id_folio='.$item['folio'].'&opcion=2'; ?>" class="list-group-item">
                                                <div class="col-lg-10">
                                                    <span  class="text-muted" style="color: blue; font-weight: bold;">
                                                        <span class="name" style="min-width: 120px; display: inline-block;">
                                                            <?php echo "(ODP ".$item['folio'].") ".$item['numeroContable']." - ".$item['emisor']; ?>
                                                        </span>
                                                        </br>
                                                        <span class="">
                                                            <?php echo utf8_decode($item['nombreProyecto']); ?>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-2">
                                                    <span class="pull-right">
                                                        <?php if($item['fechaRecepcion'] != "0000-00-00" && !empty($item['fechaRecepcion'])): ?>
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                            <span class="badge ">
                                                                <?php echo $item['fechaRecepcion']; ?>
                                                            </span>
                                                            </br>
                                                            <span class="text-muted" style="font-size: 11px; color: green; font-weight: bold;">
                                                                <?php echo $item['estadoProyecto']; ?>
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="glyphicon glyphicon-eye-close"></span>
                                                            <span class="text-muted" style="font-size: 11px; color: green; font-weight: bold;">
                                                                <?php echo $item['estadoProyecto']; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($item['lastBitacora'])): ?>
                                            <div class="list-group-item" style="display: flex">
                                                <div class="col-lg-12">
                                                    <span class="text-muted" style="font-size: 11px;">
                                                    Ultima Observacion: </br>
                                                        <?php echo utf8_decode($item['lastBitacora']); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </dt>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#bandeja').easyPaginate({
        paginateElement: 'dt',
        elementsPerPage: 20,
        effect: 'slide',
        slideOffset: 100
    });
</script>