<div class="col-lg-12">
    <h1 class="page-header">Bandeja de Salida</h1>
</div>
<!-- Select Basic -->
<div class="container col-lg-12">
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="glyphicon glyphicon-inbox"></span>Listado
                    <span class="badge"><?php echo $data['countOutbox']; ?></span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div id="bandeja" class="list-group">
                    <dl>
                        <?php if($data['outbox']): ?>
                            <?php foreach ($data['outbox'] as $item): ?>
                                <dt>
                                    <div class="list-group-item">
<!--                                        <a href="{{ path( 'ingresoProyecto', { 'id_proyecto' : item['idProyecto'], 'ib' : item['idInbox'], 'editable' : 0 } ) }}" class="list-group-item">-->
                                        <a href="<?php echo url_for('proyecto/ingresoProyecto').'?id_proyecto='.$item['idProyecto'].'&id_inbox='.$item['idInbox'].'&editable=0'; ?>" class="list-group-item">
                                            <div class="col-lg-10">
                                                <span class="name" style="min-width: 120px; display: inline-block;">
                                                    <?php echo $item['destinatario']; ?>
                                                </span>
                                                </br>
                                                <span>
                                                    <?php echo utf8_decode($item['nombreProyecto']); ?>
                                                </span>
                                            </div>
                                            <div class="col-lg-2">
                                                <span class="pull-right">
                                                    <span class="glyphicon glyphicon-upload"></span>
                                                    <span class="badge">
                                                        <?php echo $item['fechaDespacho']; ?>
                                                    </span>
                                                    </br>
                                                    <span class="text-muted" style="font-size: 11px; color: green; font-weight: bold;">
                                                        <?php echo $item['estadoProyecto']; ?>
                                                    </span>
                                                </span>
                                            </div>
                                        </a>
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

