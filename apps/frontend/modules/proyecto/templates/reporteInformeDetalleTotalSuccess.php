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
                    PROYECTO: <?php echo $sigla; ?></a>
                    </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
<!--                        <div class="input-group">-->
<!--                            <span class="input-group-addon">Filtro</span>-->
<!--                            <input id="filter" type="text" class="form-control" placeholder="Escribe squi...">-->
<!--                        </div>-->
<!--                        </br>-->
                        <table width=""  class="table  table-striped table-bordered table-hover" id="grillaInformeDetalleTotal"  data-toggle="table">
                            <thead>
                                <tr>
                                    <th width="159" data-field="codigo" data-sortable="true" data-sort-name="_date_data" data-sorter="monthSorter">Codigo de Cuenta</th>
                                    <th>Descripcion</th>
                                    <th >Comprobante<br></th>
                                    <th >Fecha</th>
                                    <th >Mes</th>
                                    <th >Año</th>
                                    <th >Glosa</th>
                                    <th >Dolares</th>
                                    <th >Pesos</th>
                                </tr>
                            </thead>
                            <tbody class="searchable">
                            <?php foreach ($listaTotalProyectosCuenta as $dettotproycuenta): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $dettotproycuenta['codigo_cuenta']; ?></td>
                                    <td><?php echo $dettotproycuenta['nombre_cuenta']; ?></td>
                                    <td align=right><?php echo ($dettotproycuenta['numero_comprobante']); ?></td>
                                    <td align=right><?php echo ($dettotproycuenta['fecha']); ?></td>
                                    <td align=right><?php echo ($dettotproycuenta['mes']); ?></td>
                                    <td align=right><?php echo ($dettotproycuenta['anho']); ?></td>
                                    <td align=right><?php echo ($dettotproycuenta['glosa']); ?></td>
                                    <td align=right><?php echo number_format($dettotproycuenta['Dolares']); ?></td>
                                    <td align=right><?php echo number_format($dettotproycuenta['Pesos']); ?></td>
                                </tr>
                            <?php endforeach; ?>
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

<script type="text/javascript">
//    $(document).ready(function ()
//    {
//        (function ($)
//        {
//            $('#filter').keyup(function ()
//            {
//                var rex = new RegExp($(this).val(), 'i');
//                $('.searchable tr').hide();
//                $('.searchable tr').filter(function () {
//                    return rex.test($(this).text());
//                }).show();
//            })
//        }(jQuery));
//    });

    function monthSorter(a, b)
    {
        if (a.month < b.month)
            return -1;
        if (a.month > b.month)
            return 1;
        return 0;
    }

    $('#grillaInformeDetalleTotal').DataTable({
        language : spanish,
        fixedColumns: true,
        fixedHeader: {
            header: true,
            footer: true,
        }
    });
</script>