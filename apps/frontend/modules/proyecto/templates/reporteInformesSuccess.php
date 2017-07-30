<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Reportes de los proyectos <?php echo ($pais) ? '- '.$pais : ''; ?></h1>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Proyectos</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover dataTable display compact nowrap table-condensed" id="tablaReporte1">
							<thead>
								<tr>
									<th>ID</th>
									<th>Vigente</th>
									<th>Sigla</th>
									<th>Grupo Proyecto</th>
									<th>Pais</th>
									<th>Tipo<br>Moneda</th>
									<th>Fecha<br>Inicio</th>
									<th>Fecha<br>Termino</th>
									<th>% Overhead</th>
									<th>Monto Total<br>Proyecto</th>
									<th>Presupuesto<br>Ingresos</th>
									<th>Presupuesto<br>Gastos</th>
									<th>Ingresos<br>Reales</th>
									<th>Gastos<br>Reales</th>
									<th>Comprometido</th>
									<th>Saldo<br>Presupuesto</th>
									<th>Saldo<br>Financiero</th>
									<th>Ppto<br>Overhead</th>
									<th>Gasto<br>Real<br>Overhead</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaTotalProyectos as $dettotproy): ?>
									<tr class="odd gradeX">
										<td>
											<?php echo link_to($dettotproy['numcontable'], url_for('@ingreso_proyecto'),array('id' => 'linkDetalleInformes','query_string' => 'id_proyecto='.$dettotproy['id_proyecto'].'&ib=3&editable=0',)); ?>
										</td>
										<td>
											<?php echo ($dettotproy['vigente']) ? 'SI' : 'NO'; ?>
										</td>
										<?php if ( $accionUsuario==6 ): ?>
											<td>
												<?php echo ($dettotproy['sigla_contable']) ? : "--"; ?>
											</td>
										<?php else: ?>
											<td>
												<?php echo ($dettotproy['sigla_contable']) ? link_to($dettotproy['sigla_contable'], url_for('@reporte_informe_detalle'), array('id' => 'linkDetalleInformes', 'query_string' => 'id='.$dettotproy['id_proyecto'].'&sigla='.$dettotproy['sigla_contable'].'&numcont='.$dettotproy['numcontable'])) : link_to('--', url_for('@reporte_informe_detalle'), array('id' => 'linkDetalleInformes', 'query_string' => 'id='.$dettotproy['id_proyecto'].'&sigla='.$dettotproy['sigla_contable'].'&numcont='.$dettotproy['numcontable'])); ?>
											</td>
										<?php endif;?>
										<td><?php echo $dettotproy['grupo_proyecto']; ?></td>
										<td><?php echo $dettotproy['pais']; ?></td>
										<td><?php echo $dettotproy['moneda']; ?></td>
										<td><?php echo $dettotproy['fec_inicio_proy_ord']; ?></td>
										<td><?php echo $dettotproy['fec_termino_proy_ord']; ?></td>
										<td><?php echo $dettotproy['porc_overhead']; ?></td>
										<td><?php echo number_format($dettotproy['monto_total']); ?></td>
										<td><?php echo number_format($dettotproy['sum_monto_ing']); ?></td>
										<td><?php echo number_format($dettotproy['sum_monto_egre']); ?></td>
										<?php if ( $dettotproy['id_moneda'] != Moneda::USD ): ?>
											<td><?php echo number_format($dettotproy['ingresos_reales'],2); ?></td>
											<td><?php echo number_format($dettotproy['gastos_reales'],2); ?></td>
											<td><?php echo number_format($dettotproy['compromisos'],2); ?></td>
											<td><?php echo number_format($dettotproy['monto_total']-$dettotproy['gastos_reales'],2); ?></td>
											<td><?php echo number_format($dettotproy['ingresos_reales']-$dettotproy['gastos_reales'],2); ?></td>
                                            <td><?php echo number_format($dettotproy['ppto_ovh'],2); ?></td>
                                            <td><?php echo number_format($dettotproy['gasto_ovhpesos'],2); ?></td>
										<?php else: ?>
											<td><?php echo number_format($dettotproy['ingresos_reales_us'],'2','.',','); ?></td>
											<td><?php echo number_format($dettotproy['gastos_reales_us'],'2','.',','); ?></td>
											<td><?php echo number_format($dettotproy['compromisos_us'],'2','.',','); ?></td>
											<td><?php echo number_format($dettotproy['monto_total']-$dettotproy['gastos_reales_us'],'2','.',','); ?></td>
											<td><?php echo number_format($dettotproy['ingresos_reales_us']-$dettotproy['gastos_reales_us'],'2','.',','); ?></td>
                                            <td><?php echo number_format($dettotproy['ppto_ovh'],'2','.',','); ?></td>
                                            <td><?php echo number_format($dettotproy['gasto_ovhus'],'2','.',','); ?></td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<th>ID</th>
								<th>Vigente</th>
								<th>Sigla</th>
								<th>Grupo Proyecto</th>
								<th>Pais</th>
								<th>Tipo<br>Moneda</th>
								<th>Fecha<br>Inicio</th>
								<th>Fecha<br>Termino</th>
								<th>% Overhead</th>
								<th>Monto Total<br>Proyecto</th>
								<th>Presupuesto<br>Ingresos</th>
								<th>Presupuesto<br>Gastos</th>
								<th>Ingresos<br>Reales</th>
								<th>Gastos<br>Reales</th>
								<th>Comprometido</th>
								<th>Saldo<br>Presupuesto</th>
								<th>Saldo<br>Financiero</th>
								<th>Ppto<br>Overhead</th>
								<th>Gasto<br>Real<br>Overhead</th>
							</tfoot>
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
	$(document).ready(function() {
		var table = $('#tablaReporte1').DataTable({
			dom: '<"toolbar">frtip',
			language : spanish,
			processing: false,
			paging: false,
			order: [[ 0, 'desc' ]],
			scrollX : true,
            scrollY: 500,
			fixedColumns: true,
			columnDefs: [
				{targets: [1], visible: false, searchable: true},
				{targets: [0,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17], visible: true, searchable: true}
			]
		});
		$('.dataTables_scroll .dataTables_scrollFootInner tfoot th').each( function () {
			var title = $('#tablaReporte1 thead th').eq( $(this).index() ).text();
//			if(title == 'ID' ){
//				$(this).html( '<input class="form-control input-sm"style="width: 80px" type="text" placeholder="Buscar '+title+'" />' );
//			}else{
//				$(this).html( '<input class="form-control input-sm" type="text" placeholder="Buscar '+title+'" />' );
//			}
			$(this).html( '<div class="right-inner-addon "><input class="glyphicon form-control input-sm" type="search" style="width: 100%;padding: 1px;font-weight: bold !important;" placeholder="&#xe003"/></div>' );
		} );

		// Apply the search
		table.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );
		table.column( 1 ).search('si');
		$("div.toolbar").html('<select id="estado_proyecto" class="select2"><option value="1" selected>Vigente</option><option value="2">No Vigente</option><option value="3">Todos</option></select>');
		table.draw();
		$('#estado_proyecto').select2();
		$('#estado_proyecto').on('change', function () {
			if($(this).val() == 1)
			{
				table.column( 1 ).search('si').draw();
			}
			if($(this).val() == 2)
			{
				table.column( 1 ).search('no').draw();
			}
			if($(this).val() == 3)
			{
				table.search('').columns().search('').draw();
			}
		})
	});
</script>