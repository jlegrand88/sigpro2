<?php

/**
 * ProyectoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProyectoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProyectoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Proyecto');
    }
    
    public function getReporteDetalle($idProyecto)
    {
        $query = "SELECT proy.numero_contable, pre_ing.cuenta, proy.sigla_contable, UPPER(pre_ing.nombre_cuenta) nombre_cuenta,
                  SUM(pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + 
                  pre_ing.julio + pre_ing.agosto + pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre) presupuesto,  
                  (
                      SELECT (ABS(SUM((ing_real.pesos)) + IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre
                            + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_tipo_movimiento = 2 AND gp.id_proyecto = pre_ing.id_proyecto AND gp.cuenta = pre_ing.cuenta AND gp.cuenta_overhead = 0),0)))
                      FROM  movimientos_contables ing_real
                      WHERE ing_real.proyecto=proy.numero_contable
                      AND pre_ing.cuenta = ing_real.codigo_cuenta
                  ) ejecucion,
                  ( 
                      SELECT ABS(SUM((ing_real.dolares))) 
                      FROM movimientos_contables ing_real 
                      WHERE ing_real.proyecto=proy.numero_contable 
                      AND pre_ing.cuenta = ing_real.codigo_cuenta 
				  ) ejecucion_us,
				  0 compromiso, id_moneda, 0 compromiso_us,
				  SUM(pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre)
                  -
                  ( 
                      select ABS(SUM((ing_real.pesos))) 
                      FROM  movimientos_contables ing_real 
                      WHERE ing_real.proyecto=proy.numero_contable 
                      AND pre_ing.cuenta = ing_real.codigo_cuenta  
				  ) saldo_efectivo,
                  SUM(pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre)
                  -
                  ( 
				      SELECT ABS(SUM((ing_real.dolares))) 
                      FROM  movimientos_contables ing_real 
                      WHERE ing_real.proyecto=proy.numero_contable 
                      and pre_ing.cuenta = ing_real.codigo_cuenta 
                  ) saldo_efectivo_us
                  FROM  proyecto proy
				  LEFT JOIN presupuesto pre_ing ON pre_ing.id_proyecto=proy.id_proyecto AND pre_ing.id_tipo_movimiento = 2
				  WHERE proy.id_Proyecto = $idProyecto AND cuenta_overhead <> 1
				  GROUP BY proy.id_proyecto, pre_ing.cuenta";
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }

    public static function getReporteDetallePorNumeroContable($numContable)
    {
        set_time_limit(0);
        $query = "select proy.numero_contable, pre_ing.cuenta, proy.sigla_contable, upper(pre_ing.nombre_cuenta) nombre_cuenta,
                    SUM(pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + 
                    pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre) presupuesto,  
                    IF(
                        ( 
                            select IFNULL(SUM(DISTINCT(ing_real.pesos)),0) + IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre 
                            + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_tipo_movimiento = 1 AND gp.id_proyecto = proy.id_proyecto AND cuenta = pre_ing.cuenta),0)   
                            from  movimientos_contables ing_real 
                            where ing_real.proyecto=proy.numero_contable 
                            and pre_ing.cuenta = ing_real.codigo_cuenta
                        ) < 0,
                        ( 
                            select IFNULL(SUM(DISTINCT(ing_real.pesos)),0) + IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre 
                            + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_tipo_movimiento = 1 AND gp.id_proyecto = proy.id_proyecto AND cuenta = pre_ing.cuenta),0)   
                            from  movimientos_contables ing_real 
                            where ing_real.proyecto=proy.numero_contable 
                            and pre_ing.cuenta = ing_real.codigo_cuenta
                        )*-1,
                        ( 
                            select IFNULL(SUM(DISTINCT(ing_real.pesos)),0) + IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre 
                            + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_tipo_movimiento = 1 AND gp.id_proyecto = proy.id_proyecto AND cuenta = pre_ing.cuenta),0)   
                            from  movimientos_contables ing_real 
                            where ing_real.proyecto=proy.numero_contable 
                            and pre_ing.cuenta = ing_real.codigo_cuenta
                        )
                    )ejecucion,
                    IF( 
                        (select ABS(SUM(DISTINCT(ing_real.dolares))) 
                        from  movimientos_contables ing_real 
                        where ing_real.proyecto=proy.numero_contable  
                        and pre_ing.cuenta = ing_real.codigo_cuenta) < 0,
                        (select ABS(SUM(DISTINCT(ing_real.dolares))) 
                        from  movimientos_contables ing_real 
                        where ing_real.proyecto=proy.numero_contable  
                        and pre_ing.cuenta = ing_real.codigo_cuenta) *-1,
                        (select ABS(SUM(DISTINCT(ing_real.dolares))) 
                        from  movimientos_contables ing_real 
                        where ing_real.proyecto=proy.numero_contable  
                        and pre_ing.cuenta = ing_real.codigo_cuenta)
                        
                    ) ejecucion_us,
                    0 compromiso, id_moneda, 0 compromiso_us
                from  proyecto proy
                left join presupuesto pre_ing on pre_ing.id_proyecto=proy.id_proyecto and pre_ing.id_tipo_movimiento=1 
                where proy.numero_contable =$numContable
                group by proy.id_proyecto, pre_ing.cuenta
                
                union all 
                
                select proy.numero_contable, pre_ing.cuenta, proy.sigla_contable, upper(pre_ing.nombre_cuenta) nombre_cuenta,
                       SUM(pre_ing.enero + pre_ing.febrero + pre_ing.marzo + pre_ing.abril + pre_ing.mayo + pre_ing.junio + pre_ing.julio + pre_ing.agosto + 
                       pre_ing.septiembre + pre_ing.octubre + pre_ing.noviembre + pre_ing.diciembre) presupuesto,  
                       ( 
                           select IFNULL(SUM((ing_real.pesos)),0) + IFNULL(( SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + gp.octubre 
                          + gp.noviembre + gp.diciembre)) FROM gasto_pais gp WHERE gp.id_tipo_movimiento = 2 AND gp.id_proyecto = proy.id_proyecto AND cuenta = pre_ing.cuenta),0)  
                           from  movimientos_contables ing_real 
                           where ing_real.proyecto=proy.numero_contable 
                           and pre_ing.cuenta = ing_real.codigo_cuenta
                       ) ejecucion,
                       ( 
                         select ABS(SUM((ing_real.dolares))) 
                         from  movimientos_contables ing_real 
                         where ing_real.proyecto=proy.numero_contable 
                         and pre_ing.cuenta = ing_real.codigo_cuenta 
                       ) ejecucion_us,
                       0 compromiso, id_moneda, 0 compromiso_us
                from  proyecto proy
                left join presupuesto pre_ing on pre_ing.id_proyecto=proy.id_proyecto and pre_ing.id_tipo_movimiento=2
                where proy.numero_contable =$numContable
                group by proy.id_proyecto, pre_ing.cuenta
                
                union all
                
                select proye.numero_contable, compromisos.codigo_cuenta, proye.sigla_contable, compromisos.nombre_cuenta,
                       0 montos, 0 ejecucion, 0, 
                       (
                           IFNULL(SUM((compromisos.pesos)),0) + 
                           IFNULL(( 
                            SELECT SUM((gp.enero + gp.febrero + gp.marzo + gp.abril + gp.mayo + gp.junio + gp.julio + gp.agosto + gp.septiembre + 
                              gp.octubre + gp.noviembre + gp.diciembre)) 
                            FROM gasto_pais gp 
                            WHERE gp.id_tipo_movimiento = 3 AND gp.id_proyecto = proye.id_proyecto AND gp.id_tipo_movimiento = 3 AND cuenta = compromisos.codigo_cuenta),0) 
                        )compromiso, 
                       id_moneda, 
                       SUM((compromisos.dolares)) compromiso_us
                from  proyecto proye
                left join movimientos_contables compromisos on compromisos.proyecto=proye.numero_contable and id_tipo_cuenta=3						
                where proye.numero_contable = $numContable
                group by proye.id_proyecto, compromisos.codigo_cuenta order by 2 asc";

        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }
}