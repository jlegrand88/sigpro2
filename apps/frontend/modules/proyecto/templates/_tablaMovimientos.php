<table id="grillaMovimientos" class="table table-striped table-bordered table-hover dataTable display compact nowrap table-condensed" cellspacing="0" width="100%"></table>
<script type="text/javascript">
    $().ready(function()
    {
        var data = [];
        <?php
        foreach($movimientos as $movimiento)
        {
//            if($movimiento->getIdTipoMoneda() == Moneda::CLP)
//            {
                $separadorMiles = ",";
                $separadorDecimales = ".";
//            }else{
//                $separadorMiles = ",";
//                $separadorDecimales = ".";
//            }
        ?>
            data.push({
                'id' : '<?php echo $movimiento->getIdPresupuesto(); ?>',
                'periodo' : '<?php echo $movimiento->getPeriodo(); ?>',
                'tipo_movimiento' : '<?php echo $movimiento->getIdTipoMovimiento(); ?>',
                'numero_cuenta' : '<?php echo $movimiento->getCuenta(); ?>',
                'nombre_cuenta' : '<?php echo $movimiento->getNombreCuenta(); ?>',
                'enero' : '<?php echo number_format($movimiento->getEnero(),'0',$separadorDecimales,$separadorMiles); ?>',
                'febrero' : '<?php echo number_format($movimiento->getFebrero(),'0',$separadorDecimales,$separadorMiles); ?>',
                'marzo' : '<?php echo number_format($movimiento->getMarzo(),'0',$separadorDecimales,$separadorMiles); ?>',
                'abril' : '<?php echo number_format($movimiento->getAbril(),'0',$separadorDecimales,$separadorMiles); ?>',
                'mayo' : '<?php echo number_format($movimiento->getMayo(),'0',$separadorDecimales,$separadorMiles); ?>',
                'junio' : '<?php echo number_format($movimiento->getJunio(),'0',$separadorDecimales,$separadorMiles); ?>',
                'julio' : '<?php echo number_format($movimiento->getJulio(),'0',$separadorDecimales,$separadorMiles); ?>',
                'agosto' : '<?php echo number_format($movimiento->getAgosto(),'0',$separadorDecimales,$separadorMiles); ?>',
                'septiembre' : '<?php echo number_format($movimiento->getSeptiembre(),'0',$separadorDecimales,$separadorMiles); ?>',
                'octubre' : '<?php echo number_format($movimiento->getOctubre(),'0',$separadorDecimales,$separadorMiles); ?>',
                'noviembre' : '<?php echo number_format($movimiento->getNoviembre(),'0',$separadorDecimales,$separadorMiles); ?>',
                'diciembre' : '<?php echo number_format($movimiento->getDiciembre(),'0',$separadorDecimales,$separadorMiles); ?>',
                'total' : '<?php echo number_format($movimiento->getTotal(),'0',$separadorDecimales,$separadorMiles); ?>',
                'tiene_overhead' : '<?php echo ($movimiento->getTieneOverhead()) ? "Si" : "No";?>',
                'cuenta_overhead' : '<?php echo ($movimiento->getCuentaOverhead()) ? "1" : "0";?>'
            });
        <?php
        }
        ?>
        var table = $('#grillaMovimientos').DataTable({
//            dom: 'Bfrtip',
            language: spanish,
//            responsive : true,
            select : {style: 'single',items: 'row'},
            data : data,
//            buttons: ['copy', 'excel', 'pdf'],
            columns:[
                {data: 'id', title: 'id'},
                {data: 'periodo', title: 'Periodo'},
                {data: 'tipo_movimiento', title: 'Tipo'},
                {data: 'numero_cuenta', title: 'N° Cuenta'},
                {data: 'nombre_cuenta', title: 'Nombre Cuenta'},
                {data: 'enero', title: 'Enero'},
                {data: 'febrero', title: 'Febrero'},
                {data: 'marzo', title: 'Marzo'},
                {data: 'abril', title: 'Abril'},
                {data: 'mayo', title: 'Mayo'},
                {data: 'junio', title: 'Junio'},
                {data: 'julio', title: 'Julio'},
                {data: 'agosto', title: 'Agosto'},
                {data: 'septiembre', title: 'Septiembre'},
                {data: 'octubre', title: 'Octubre'},
                {data: 'noviembre', title: 'Noviembre'},
                {data: 'diciembre', title: 'Diciembre'},
                {data: 'total', title: 'Total'},
                {data: 'tiene_overhead', title: 'OVH'},
                {data: 'cuenta_overhead', title: 'esOVH'}
            ],
            scrollX : true,
            scrollY: 640,
            paginate: false,
            fixedColumns: true,
            columnDefs:[{targets: [0,19], visible: false, searchable: false}]
        });

        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        } );

        table.on( 'select', function (e, dt, type, indexes) {
            if ( type === 'row' ) {
                var fila = indexes;
                var data = table.rows( indexes ).data()[0];
                $('#btnEditMovimiento').data('id',data.id);
                $('#btnEditMovimiento').attr('disabled',false);
                $('#btnDeleteMovimiento').data('id',data.id);
                $('#btnDeleteMovimiento').attr('disabled',false);
                if(data.cuenta_overhead == "1")
                {
                    $('#btnCalcularOVH').data('id',data.id);
                    $('#btnCalcularOVH').show();
                }else{
                    $('#btnCalcularOVH').hide();
                }
            }
        } );
        table.on( 'deselect', function (e, dt, type, indexes) {
            resetBtnsMovimientos();
        } );
    });
</script>