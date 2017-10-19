<?php

/**
 * RptGeneralProyectoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RptGeneralProyectoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object RptGeneralProyectoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('RptGeneralProyecto');
    }

    public static function getListadoProyectosValoresPorGrupo($grupo)
    {
        set_time_limit(0);
        $query = "select id_proyecto, sigla_contable, monto_total, monto_ing sum_monto_ing, monto_egre sum_monto_egre, ing_reales ingresos_reales, gas_reales gastos_reales, compromisos, 
                        ing_reales_us ingresos_reales_us, gas_reales_us gastos_reales_us, compromisos_us, numcontable, id_moneda, porc_overhead, grupo_proyecto, 
                DATE_FORMAT(fec_inicio_proy, '%d-%m-%Y') fec_inicio_proy, DATE_FORMAT(fec_termino_proy, '%d-%m-%Y') fec_termino_proy, moneda, pais, ppto_ovh, gasto_ovhpesos, gasto_ovhus 
             from rpt_general_proyecto order by numcontable DESC ";
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }

    public static function getListadoProyectosValores()
    {
        set_time_limit(0);
//        $query = "select id_proyecto,(SELECT pro.vigente from proyecto pro WHERE pro.id_proyecto = rpt_general_proyecto.id_proyecto ) vigente, sigla_contable, monto_total, monto_ing sum_monto_ing, monto_egre sum_monto_egre, ing_reales ingresos_reales, gas_reales gastos_reales, compromisos,
//			         ing_reales_us ingresos_reales_us, gas_reales_us gastos_reales_us, compromisos_us, numcontable, id_moneda, porc_overhead, grupo_proyecto,
//					 DATE_FORMAT(fec_inicio_proy, '%d-%m-%Y') fec_inicio_proy, DATE_FORMAT(fec_termino_proy, '%d-%m-%Y') fec_termino_proy, moneda, pais, ppto_ovh, gasto_ovhpesos, gasto_ovhus,
//                     fec_inicio_proy fec_inicio_proy_ord, fec_termino_proy fec_termino_proy_ord
//					 from rpt_general_proyecto order by numcontable DESC";
        $query = "SELECT
                  proy.id_proyecto,
                  proy.vigente,
                  proy.sigla_contable,
                  proy.monto_total,
                  (
                    SELECT SUM((pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre)) sum_monto_egre
                    FROM presupuesto pre_ing
                    where pre_ing.id_proyecto=proy.id_proyecto AND pre_ing.id_tipo_movimiento=1
                  )
                  sum_monto_ing,
                  (
                    SELECT SUM((pre_egre.enero + pre_egre.febrero + pre_egre.marzo + pre_egre.abril + pre_egre.mayo + pre_egre.junio + pre_egre.julio + pre_egre.agosto + pre_egre.septiembre + pre_egre.octubre + pre_egre.noviembre + pre_egre.diciembre)) sum_monto_egre
                    FROM presupuesto pre_egre
                    where pre_egre.id_proyecto=proy.id_proyecto AND pre_egre.id_tipo_movimiento=2
                  ) sum_monto_egre,
                  (
                    IF(
                      (IFNULL((SELECT SUM((pesos))FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      ) < 0 ,
                      (IFNULL((SELECT SUM((pesos)) FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      ) *-1,
                      (IFNULL((SELECT SUM((pesos))FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      )
                    )
                  )ingresos_reales,
                  (
                    IFNULL((SELECT SUM((pesos)) FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 2),0.00) +
                    IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 2 ),0.00)
                  ) gastos_reales,
                  (
                    IFNULL((SELECT SUM((pesos)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta = 3  ),0.00) +
                    IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 3 ),0.00)
                  )compromisos,
                  IF(IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00) < 0,
                    IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00) *-1,
                    IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00)
                  ) ingresos_reales_us,
                  IFNULL(( SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=2),0.00) gastos_reales_us,
                  IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta = 3),0.00) compromisos_us,
                  proy.numero_contable numcontable, proy.id_moneda, proy.overhead_autorizado porc_overhead,
                  ( SELECT descripcion FROM grupo_proyecto where id_grupo_proyecto=proy.id_grupo_proyecto  ) grupo_proyecto,
                  proy.fecha_inicio fec_inicio_proy_ord, proy.fecha_termino fec_termino_proy_ord, upper(mon.descripcion) moneda, upper(pai.descripcion) pais,
                  (
                    SELECT coalesce( SUM((enero)+(febrero)+(marzo)+(abril)+(mayo)+(junio)+(julio)+(agosto)+(septiembre)+(octubre)+(noviembre)+(diciembre)), 0)
                    FROM presupuesto
                    WHERE id_proyecto = proy.id_proyecto AND id_tipo_movimiento=2 AND cuenta_overhead=1
                  ) ppto_ovh,
                  (
                    IFNULL((
                      SELECT sum(pesos)
                      FROM movimientos_contables mov
                      where proyecto = proy.numero_contable
                      AND codigo_cuenta
                      in
                      (
                        SELECT cuenta FROM presupuesto pre where pre.id_proyecto=proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                      )
                    ),0.00) +
                    IFNULL((
                      SELECT sum(gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)
                      FROM gasto_pais gp
                      WHERE gp.id_proyecto = proy.id_proyecto AND gp.cuenta_overhead = 1 AND gp.id_tipo_movimiento = 2
                      AND gp.cuenta
                      IN
                      (
                        SELECT cuenta FROM presupuesto pre WHERE pre.id_proyecto = proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                      )
                    ),0.00)
                  )gasto_ovhpesos,
                  (IFNULL((
                    SELECT sum(dolares)
                    FROM movimientos_contables mov
                    where proyecto = proy.numero_contable
                    AND codigo_cuenta
                    IN
                    (
                      SELECT cuenta FROM presupuesto pre where pre.id_proyecto=proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                    )),0.00)) gasto_ovhus
                FROM  proyecto proy
                JOIN presupuesto pre_ing ON pre_ing.id_proyecto=proy.id_proyecto AND pre_ing.id_tipo_movimiento=1
                JOIN moneda mon ON mon.id_moneda = proy.id_moneda
                JOIN pais pai ON pai.id_pais = proy.id_pais
                GROUP BY proy.id_proyecto";
        
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }
    
    public static function getListadoProyectosValoresPorResponsable($idUsuario)
    {
        set_time_limit(0);
        $query = "select id_proyecto, sigla_contable, monto_total, monto_ing sum_monto_ing, monto_egre sum_monto_egre, ing_reales ingresos_reales, gas_reales gastos_reales, compromisos, 
			                ing_reales_us ingresos_reales_us, gas_reales_us gastos_reales_us, compromisos_us, numcontable, id_moneda, porc_overhead, grupo_proyecto, 
					DATE_FORMAT(fec_inicio_proy, '%d-%m-%Y') fec_inicio_proy, DATE_FORMAT(fec_termino_proy, '%d-%m-%Y') fec_termino_proy, moneda, pais, ppto_ovh, gasto_ovhpesos, gasto_ovhus 
				 from rpt_general_proyecto where id_proyecto in ( select id_proyecto from proyecto_grupo where id_usuario=$idUsuario ) 
				 order by numcontable DESC ";
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }

    public static function getListadoProyectosValoresPais($pais)
    {
        set_time_limit(0);
        $query = "select id_proyecto, sigla_contable, monto_total, monto_ing sum_monto_ing, monto_egre sum_monto_egre, ing_reales ingresos_reales, gas_reales gastos_reales, compromisos, 
			                ing_reales_us ingresos_reales_us, gas_reales_us gastos_reales_us, compromisos_us, numcontable, id_moneda, porc_overhead, grupo_proyecto, 
							DATE_FORMAT(fec_inicio_proy, '%d-%m-%Y') fec_inicio_proy, DATE_FORMAT(fec_termino_proy, '%d-%m-%Y') fec_termino_proy, moneda, pais, ppto_ovh, gasto_ovhpesos, gasto_ovhus 
							from rpt_general_proyecto where pais = '$pais' order by numcontable DESC ";
        
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }
    
    public function resetRegistros()
    {
        return Doctrine_Query::create()
            ->delete("RptGeneralProyecto")
            ->execute();
    }

    public function poblarReporteGeneralProyecto()
    {
        set_time_limit(0);
        $this->resetRegistros();
        $query = "INSERT INTO rpt_general_proyecto (id_proyecto, sigla_contable, monto_total, monto_ing, monto_egre, ing_reales, gas_reales, compromisos, ing_reales_us, gas_reales_us, compromisos_us, numcontable, id_moneda, porc_overhead, grupo_proyecto, fec_inicio_proy, fec_termino_proy, moneda, pais, ppto_ovh, gasto_ovhpesos, gasto_ovhus)
                SELECT
                  proy.id_proyecto,
                  proy.sigla_contable,
                  proy.monto_total,
                  (
                    SELECT SUM((pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre)) sum_monto_egre
                    FROM presupuesto pre_ing
                    where pre_ing.id_proyecto=proy.id_proyecto AND pre_ing.id_tipo_movimiento=1
                  )
                  sum_monto_ing,
                  (
                    SELECT SUM((pre_egre.enero + pre_egre.febrero + pre_egre.marzo + pre_egre.abril + pre_egre.mayo + pre_egre.junio + pre_egre.julio + pre_egre.agosto + pre_egre.septiembre + pre_egre.octubre + pre_egre.noviembre + pre_egre.diciembre)) sum_monto_egre
                    FROM presupuesto pre_egre
                    where pre_egre.id_proyecto=proy.id_proyecto AND pre_egre.id_tipo_movimiento=2
                  ) sum_monto_egre,
                  (
                    IF(
                      (IFNULL((SELECT SUM((pesos))FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      ) < 0 ,
                      (IFNULL((SELECT SUM((pesos)) FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      ) *-1,
                      (IFNULL((SELECT SUM((pesos))FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 1), 0.00) +
                       IFNULL((SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 1), 0)
                      )
                    ) 
                  )ingresos_reales,
                  (
                    IFNULL((SELECT SUM((pesos)) FROM movimientos_contables WHERE proyecto = proy.numero_contable AND id_tipo_cuenta = 2),0.00) +
                    IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 2 ),0.00)
                  ) gastos_reales,
                  (
                    IFNULL((SELECT SUM((pesos)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta = 3  ),0.00) +
                    IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_proyecto = proy.id_proyecto AND gp.id_tipo_movimiento = 3 ),0.00)
                  )compromisos,
                  IF(IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00) < 0,
                    IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00) *-1,
                    IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=1),0.00)
                  ) ingresos_reales_us,
                  IFNULL(( SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta=2),0.00) gastos_reales_us,
                  IFNULL((SELECT SUM((dolares)) FROM movimientos_contables where proyecto=proy.numero_contable AND id_tipo_cuenta = 3),0.00) compromisos_us,
                  proy.numero_contable numcontable, proy.id_moneda, proy.overhead_autorizado,
                  ( SELECT descripcion FROM grupo_proyecto where id_grupo_proyecto=proy.id_grupo_proyecto  ) grupo_proyecto,
                  proy.fecha_inicio, proy.fecha_termino, upper(mon.descripcion), upper(pai.descripcion),
                  (
                    SELECT coalesce( SUM((enero)+(febrero)+(marzo)+(abril)+(mayo)+(junio)+(julio)+(agosto)+(septiembre)+(octubre)+(noviembre)+(diciembre)), 0)
                    FROM presupuesto
                    WHERE id_proyecto = proy.id_proyecto AND id_tipo_movimiento=2 AND cuenta_overhead=1
                  ) montoovh,
                  (
                    IFNULL((
                      SELECT sum(pesos)
                      FROM movimientos_contables mov
                      where proyecto = proy.numero_contable
                      AND codigo_cuenta
                      in
                      (
                        SELECT cuenta FROM presupuesto pre where pre.id_proyecto=proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                      )
                    ),0.00) +
                    IFNULL((
                      SELECT sum(gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre + gp.noviembre + gp.diciembre)
                      FROM gasto_pais gp
                      WHERE gp.id_proyecto = proy.id_proyecto AND gp.cuenta_overhead = 1 AND gp.id_tipo_movimiento = 2 
                      AND gp.cuenta
                      IN
                      (
                        SELECT cuenta FROM presupuesto pre WHERE pre.id_proyecto = proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                      )
                    ),0.00)
                  )gastomontoovh,
                  (IFNULL((
                    SELECT sum(dolares)
                    FROM movimientos_contables mov
                    where proyecto = proy.numero_contable
                    AND codigo_cuenta
                    IN
                    (
                      SELECT cuenta FROM presupuesto pre where pre.id_proyecto=proy.id_proyecto AND pre.id_tipo_movimiento=2 AND pre.cuenta_overhead=1 GROUP BY cuenta
                    )),0.00)) gastomontoovh_us
                FROM  proyecto proy
                JOIN presupuesto pre_ing ON pre_ing.id_proyecto=proy.id_proyecto AND pre_ing.id_tipo_movimiento=1
                JOIN moneda mon ON mon.id_moneda = proy.id_moneda
                JOIN pais pai ON pai.id_pais = proy.id_pais
                GROUP BY proy.id_proyecto";
        
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->exec($query);
        return $response;
    }
    
    
}