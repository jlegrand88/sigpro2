<?php

/**
 * PresupuestoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PresupuestoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PresupuestoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Presupuesto');
    }

    public static function getSumIngresos($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("(SUM(enero)+SUM(febrero)+SUM(marzo)+SUM(abril)+SUM(mayo)+SUM(junio)+SUM(julio)+SUM(agosto)+SUM(septiembre)+SUM(octubre)+SUM(noviembre)+SUM(diciembre)) as sum_monto ")
            ->from("Presupuesto")
            ->where("id_proyecto = ? and id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::INGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function getSumEgresos($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("(SUM(enero)+SUM(febrero)+SUM(marzo)+SUM(abril)+SUM(mayo)+SUM(junio)+SUM(julio)+SUM(agosto)+SUM(septiembre)+SUM(octubre)+SUM(noviembre)+SUM(diciembre)) as sum_monto ")
            ->from("Presupuesto")
            ->where("id_proyecto = ? and id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::EGRESO))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function getSumOverhead($idProyecto)
    {
        return Doctrine_Query::create()
            ->select("SUM((enero)+(febrero)+(marzo)+(abril)+(mayo)+(junio)+(julio)+(agosto)+(septiembre)+(octubre)+(noviembre)+(diciembre)) as sum_monto ")
            ->from("Presupuesto")
            ->where("id_proyecto = ? AND id_tipo_movimiento = ? and cuenta_overhead = ?",array($idProyecto,TipoMovimiento::EGRESO,1))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public static function getSumEgresosPorMes($idProyecto,$mes,$periodo)
    {
        return Doctrine_Query::create()
            ->select("SUM($mes) as sum_monto")
            ->from("Presupuesto")
            ->where("id_proyecto = ? and id_tipo_movimiento = ?",array($idProyecto,TipoMovimiento::EGRESO))
            ->andWhere("periodo = ? AND cuenta_overhead = ? AND tiene_overhead = ?",array($periodo,0,1))
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public function cuentaRepetida($idProyecto,$idTipoMovimiento,$periodo,$cuenta,$idPresupuesto = null)
    {
        $q = Doctrine_Query::create()
            ->select("count(id_presupuesto) as count")
            ->from("Presupuesto")
            ->where("id_proyecto = ? AND id_tipo_movimiento = ? AND periodo = ? AND cuenta = ?",array($idProyecto, $idTipoMovimiento, $periodo, $cuenta));
        if($idPresupuesto){
            $q->andWhere("id_presupuesto <> ?",array($idPresupuesto));
        }

            return $q->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

    public function countCuentaPorProyecto($idProyecto, $cuenta)
    {
        $q = Doctrine_Query::create()
            ->select("count(id_presupuesto) as count")
            ->from("Presupuesto")
            ->where("id_proyecto = ? AND cuenta = ?",array($idProyecto, $cuenta));
        return $q->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }
}