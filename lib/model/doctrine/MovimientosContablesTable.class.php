<?php

/**
 * MovimientosContablesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MovimientosContablesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MovimientosContablesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MovimientosContables');
    }

    public static function sumIngresoReales($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("ABS(SUM(DISTINCT(mov.pesos))) as ingresos_reales")
            ->from("MovimientosContables mov")
            ->addFrom("Presupuesto pre")
            ->where("pre.cuenta = mov.codigo_cuenta")
            ->andWhere("pre.id_proyecto = ? AND pre.id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::INGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function sumIngresoRealesUs($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("ABS(SUM(DISTINCT(mov.Dolares))) as ingresos_reales_us")
            ->from("MovimientosContables mov")
            ->addFrom("Presupuesto pre")
            ->where("pre.cuenta = mov.codigo_cuenta")
            ->andWhere("pre.id_proyecto = ? AND pre.id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::INGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }
    
    public static function sumGastosReales($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("ABS(SUM(DISTINCT(mov.pesos))) as ingresos_reales")
            ->from("MovimientosContables mov")
            ->addFrom("Presupuesto pre")
            ->where("pre.cuenta = mov.codigo_cuenta")
            ->andWhere("pre.id_proyecto = ? AND pre.id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::EGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function sumGastosRealesUs($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("ABS(SUM(DISTINCT(mov.Dolares))) as ingresos_reales_us")
            ->from("MovimientosContables mov")
            ->addFrom("Presupuesto pre")
            ->where("pre.cuenta = mov.codigo_cuenta")
            ->andWhere("pre.id_proyecto = ? AND pre.id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::EGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function sumCompromisos($numContable)
    {
        return Doctrine_Query::create()
            ->select("SUM(DISTINCT(pesos)) as sumCompromisos")
            ->from("MovimientosContables")
            ->where("SUBSTRING(codigo_cuenta,5,3) = $numContable")
            ->andWhere("SUBSTRING(codigo_cuenta,9,3) <> '01' AND nombre_cuenta LIKE ('%(C/P)%')")
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function sumCompromisosUs($numContable)
    {
        return Doctrine_Query::create()
            ->select("SUM(DISTINCT(dolares)) as sumCompromisos")
            ->from("MovimientosContables")
            ->where("SUBSTRING(codigo_cuenta,5,3) = $numContable")
            ->andWhere("SUBSTRING(codigo_cuenta,9,3) <> '01' AND nombre_cuenta LIKE ('%(C/P)%')")
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function getReporteDetalleCuentas($numContable)
    {
        $query = "SELECT codigo_cuenta, nombre_cuenta, numero_comprobante, DATE_FORMAT(fecha, '%d-%m-%Y') fecha, mes, anho, glosa, Dolares, Pesos 
			             from movimientos_contables WHERE SUBSTRING(codigo_cuenta,5,3)=$numContable 
						 ORDER BY codigo_cuenta ASC,anho ASC,  mes ASC, fecha ASC";
        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($query);
        return $response;
    }

    public static function deleteCurrents()
    {
        return Doctrine_Query::create()
            ->delete("MovimientosContables")
            ->where("anho BETWEEN 2016 AND 2017")
            ->execute();
    }

    public static function deleteLegacy()
    {
        return Doctrine_Query::create()
            ->delete("MovimientosContables")
            ->where("anho < 2016")
            ->execute();
    }

    public function countCuentaPorProyecto($idProyecto, $cuenta)
    {
        $q = Doctrine_Query::create()
            ->select("count(id) as count")
            ->from("MovimientosContables")
            ->where("proyecto = ? AND codigo_cuenta = ?",array($idProyecto, $cuenta));
        return $q->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }
}