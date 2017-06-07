<table id="grillaMovimientos" class="table table-striped table-bordered table-hover dataTable display compact nowrap table-condensed" style="width: 100% !important;"></table>
<script type="text/javascript">
    $().ready(function()
    {
        var data = [];
<?php
        foreach($movimientos as $movimiento)
        {
        ?>
        data.push({
            'id' : '<?php echo $movimiento->getIdPresupuesto();?>',
            'periodo' : '<?php echo $movimiento->getPeriodo();?>',
            'tipo_movimiento' : '<?php echo $movimiento->getIdTipoMovimiento();?>',
            'numero_cuenta' : '<?php echo $movimiento->getCuenta();?>',
            'nombre_cuenta' : '<?php echo $movimiento->getNombreCuenta();?>',
            'enero' : '<?php echo $movimiento->getEnero();?>',
            'febrero' : '<?php echo $movimiento->getFebrero();?>',
            'marzo' : '<?php echo $movimiento->getMarzo();?>',
            'abril' : '<?php echo $movimiento->getAbril();?>',
            'mayo' : '<?php echo $movimiento->getMayo();?>',
            'junio' : '<?php echo $movimiento->getJunio();?>',
            'julio' : '<?php echo $movimiento->getJulio();?>',
            'agosto' : '<?php echo $movimiento->getAgosto();?>',
            'septiembre' : '<?php echo $movimiento->getSeptiembre();?>',
            'octubre' : '<?php echo $movimiento->getOctubre();?>',
            'noviembre' : '<?php echo $movimiento->getNoviembre();?>',
            'diciembre' : '<?php echo $movimiento->getDiciembre();?>',
            'total' : '<?php echo $movimiento->getTotal();?>',
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
            columnDefs:[{targets: [0,19], visible: false, searchable: false}]
        });
        new $.fn.dataTable.FixedHeader(table);
        
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