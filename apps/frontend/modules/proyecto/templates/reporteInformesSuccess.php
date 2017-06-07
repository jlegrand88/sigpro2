<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Reportes de los proyectos - <?echo $pais; ?></h1>
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
						<table class="table table-striped table-bordered table-hover dataTable display compact nowrap table-condensed no-footer dtr-inline" id="tablaReporte1">
							<thead>
								<tr>
									<th width="3%">ID</th>
									<th width="5%">Sigla</th>
									<th width="6%">Grupo Proyecto</th>
									<th width="5%">Pais</th>
									<th width="5%">Tipo<br>Moneda</th>
									<th width="6%">Fecha<br>Inicio</th>
									<th width="6%">Fecha<br>Termino</th>
									<th width="4%">% Overhead</th>
									<th width="8%">Monto Total<br>Proyecto</th>
									<th width="7%">Presupuesto<br>Ingresos</th>
									<th width="5%">Presupuesto<br>Gastos</th>
									<th width="5%">Ingresos<br>Reales</th>
									<th width="5%">Gastos<br>Reales</th>
									<th width="5%">Comprometido</th>
									<th width="5%">Saldo<br>Presupuesto</th>
									<th width="5%">Saldo<br>Financiero</th>
									<th width="5%">Ppto<br>Overhead</th>
									<th width="5%">Gasto<br>Real<br>Overhead</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaTotalProyectos as $dettotproy): ?>
									<tr class="odd gradeX">
										<td>
											<?php echo link_to($dettotproy['numcontable'], url_for('@ingreso_proyecto'),array('id' => 'linkDetalleInformes','query_string' => 'id_proyecto='.$dettotproy['id_proyecto'].'&ib=3&editable=0',)); ?>
										</td>
										<?php if ( $accionUsuario==6 ): ?>
											<td>
												<?php echo $dettotproy['sigla_contable']; ?>
											</td>
										<?php else: ?>
											<td>
												<?php echo link_to($dettotproy['sigla_contable'], url_for('@reporte_informe_detalle'), array('id' => 'linkDetalleInformes', 'query_string' => 'id='.$dettotproy['id_proyecto'].'&sigla='.$dettotproy['sigla_contable'].'&numcont='.$dettotproy['numcontable'])); ?>
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
										<?php if ( $dettotproy['id_moneda'] == Moneda::CLP ): ?>
											<td><?php echo number_format($dettotproy['ingresos_reales']); ?></td>
											<td><?php echo number_format($dettotproy['gastos_reales']); ?></td>
											<td><?php echo number_format($dettotproy['compromisos']); ?></td>
											<td><?php echo number_format($dettotproy['monto_total']-$dettotproy['gastos_reales']); ?></td>
											<td><?php echo number_format($dettotproy['ingresos_reales']-$dettotproy['gastos_reales']); ?></td>
										<?php else: ?>
											<td><?php echo number_format($dettotproy['ingresos_reales_us']); ?></td>
											<td><?php echo number_format($dettotproy['gastos_reales_us']); ?></td>
											<td><?php echo number_format($dettotproy['compromisos_us']); ?></td>
											<td><?php echo number_format($dettotproy['monto_total']-$dettotproy['gastos_reales_us']); ?></td>
											<td><?php echo number_format($dettotproy['ingresos_reales_us']-$dettotproy['gastos_reales_us']); ?></td>
										<?php endif; ?>
										<td><?php echo number_format($dettotproy['ppto_ovh']); ?></td>
										<?php if ( $dettotproy['id_moneda'] == Moneda::CLP ): ?>
											<td><?php echo number_format($dettotproy['gasto_ovhpesos']); ?></td>
										<?php else: ?>
											<td><?php echo number_format($dettotproy['gasto_ovhus']); ?></td>
										<?php endif; ?>
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
	$(document).ready(function() {
		$('#tablaReporte1').DataTable({
			language : spanish,
			searching: true,
			paging: false,
			scrollX : true,
			fixedColumns: true,
			fixedHeader: {
				header: true,
				footer: true,
			},
			deferRender: true,
			scrollY:     630,
//			scroller: {
//				loadingIndicator: true
//			}
		});

	});
</script>