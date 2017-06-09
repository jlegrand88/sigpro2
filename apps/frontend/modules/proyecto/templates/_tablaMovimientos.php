<table id="grillaMovimientos" class="table table-striped table-bordered table-hover dataTable display compact nowrap table-condensed" style="width: 100% !important;">
    <thead>
        <tr>
            <th>id</th>
            <th>Periodo</th>
            <th >Tipo<br></th>
            <th >N° Cuenta</th>
            <th >Nombre Cuenta</th>
            <th >Enero</th>
            <th >Febrero</th>
            <th >Marzo</th>
            <th >Abril</th>
            <th >Mayo</th>
            <th >Junio</th>
            <th >Julio</th>
            <th >Agosto</th>
            <th >Septiembre</th>
            <th >Octubre</th>
            <th >Noviembre</th>
            <th >Diciembre</th>
            <th >Total</th>
            <th >OVH</th>
            <th >esOVH</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($movimientos as $movimiento):
                $separadorMiles = ".";
                $separadorDecimales = ",";
            ?>
            <tr>
                <td><?php echo $movimiento->getIdPresupuesto(); ?></td>
                <td><?php echo $movimiento->getPeriodo(); ?></td>
                <td><?php echo $movimiento->getIdTipoMovimiento(); ?></td>
                <td><?php echo $movimiento->getCuenta(); ?></td>
                <td><?php echo $movimiento->getNombreCuenta(); ?></td>
                <td><?php echo number_format($movimiento->getEnero(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getFebrero(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getMarzo(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getAbril(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getMayo(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getJunio(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getJulio(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getAgosto(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getSeptiembre(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getOctubre(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getNoviembre(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getDiciembre(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo number_format($movimiento->getTotal(),'0',$separadorDecimales,$separadorMiles); ?></td>
                <td><?php echo ($movimiento->getTieneOverhead()) ? "Si" : "No";?></td>
                <td><?php echo ($movimiento->getCuentaOverhead()) ? "1" : "0";?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $().ready(function()
    {
//        var table = $('#grillaMovimientos').DataTable({
////            dom: 'Bfrtip',
//            language: spanish,
////            responsive : true,
////            select : {style: 'single',items: 'row'},
////            data : data,
////            buttons: ['copy', 'excel', 'pdf'],
//            scrollX : true,
//            scrollY: 640,
//            fixedColumns: true,
////            columnDefs:[{targets: [0,19], visible: false, searchable: false}]
//        });
//        new $.fn.dataTable.FixedHeader(table);
        $('#grillaMovimientos').DataTable({
            language : spanish,
            fixedColumns: true,
            paginate: false,
            scrollX : true,
            scrollY: 640,
            fixedHeader: {
                header: true,
                footer: true
            }
        });
        
//        table.on( 'select', function (e, dt, type, indexes) {
//            if ( type === 'row' ) {
//                var fila = indexes;
//                var data = table.rows( indexes ).data()[0];
//                $('#btnEditMovimiento').data('id',data.id);
//                $('#btnEditMovimiento').attr('disabled',false);
//                $('#btnDeleteMovimiento').data('id',data.id);
//                $('#btnDeleteMovimiento').attr('disabled',false);
//                if(data.cuenta_overhead == "1")
//                {
//                    $('#btnCalcularOVH').data('id',data.id);
//                    $('#btnCalcularOVH').show();
//                }else{
//                    $('#btnCalcularOVH').hide();
//                }
//            }
//        } );
//        table.on( 'deselect', function (e, dt, type, indexes) {
//            resetBtnsMovimientos();
//        } );
    });

</script>