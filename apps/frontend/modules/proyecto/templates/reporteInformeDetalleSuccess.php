<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Resumen por cuentas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    PROYECTO:
                    <?php echo link_to($sigla, url_for('@reporte_informe_detalle_total'),array('id' => 'linkDetalleInformes','query_string' => 'numcont='.$numContable.'&sigla='.$sigla,)); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table width="" class="table table-striped table-bordered table-hover" id="dataTables-detalleproyecto">
                            <thead>
                                <tr>
                                    <th width="159">Codigo de Cuenta</th>
                                    <th>Descripcion</th>
                                    <th >Presupuesto<br></th>
                                    <th >Ejecucion</th>
                                    <th >Comprometido</th>
                                    <th >Saldo Efectivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumppto=0;
                                $sumejec=0;
                                $sumcompr=0;
                                $sumejec_us=0;
                                $sumcompr_us=0;
                                foreach ($listaTotalProyectosCuenta as $dettotproycuenta):
                                ?>
                                    <tr class="odd gradeX">
                                        <td>
                                        <?php echo $dettotproycuenta['cuenta']; ?>
                                        </td>
                                        <td><?php echo $dettotproycuenta['nombre_cuenta']; ?></td>
                                        <td align=right><?php echo number_format($dettotproycuenta['presupuesto']); ?></td>
                                        <?php if ( $dettotproycuenta['id_moneda'] == Moneda::CLP ): ?>
                                            <td align=right><?php echo number_format($dettotproycuenta['ejecucion']); ?></td>
                                            <td align=right><?php echo number_format($dettotproycuenta['compromiso']); ?></td>
                                            <td align=right><?php echo number_format($dettotproycuenta['presupuesto']-$dettotproycuenta['ejecucion']); ?></td>
                                        <?php else: ?>
                                            <td align=right><?php echo number_format($dettotproycuenta['ejecucion_us']); ?></td>
                                            <td align=right><?php echo number_format($dettotproycuenta['compromiso_us']); ?></td>
                                            <td align=right><?php echo number_format($dettotproycuenta['presupuesto']-$dettotproycuenta['ejecucion_us']); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php
                                    if ( substr($dettotproycuenta['cuenta'], -2) != '01' )
                                    {
                                        $sumppto     = $sumppto + $dettotproycuenta['presupuesto'];
                                        if ( $dettotproycuenta['id_moneda'] == Moneda::CLP ){
                                            $sumejec = $sumejec + $dettotproycuenta['ejecucion'];
                                            $sumcompr = $sumcompr + $dettotproycuenta['compromiso'];
                                        }else{
                                            $sumejec  = $sumejec + $dettotproycuenta['ejecucion_us'];
                                            $sumcompr = $sumcompr + $dettotproycuenta['compromiso_us'];
                                        }
                                    }
                                endforeach;
                                ?>
                                <tr>
                                    <td width="159"></td>
                                    <td>TOTAL GASTOS</td>
                                    <td align=right><?php echo number_format($sumppto)?></td>
                                    <td align=right><?php echo number_format($sumejec)?></td>
                                    <td align=right><?php echo number_format($sumcompr)?></td>
                                    <td align=right></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<script>
    $('#dataTables-detalleproyecto').DataTable({
        language : spanish,
        searching: false,
        paging: false,
        fixedColumns: true,
        fixedHeader: {
            header: true,
            footer: true,
        },
        deferRender: true,
    });
</script>