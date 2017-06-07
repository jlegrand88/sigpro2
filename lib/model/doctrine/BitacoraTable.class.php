<?php

/**
 * BitacoraTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BitacoraTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BitacoraTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bitacora');
    }

    public function getLastBitacoraProyecto($idProyecto)
    {
        $q = Doctrine_Query::create()
                ->select('observacion')
                ->from('Bitacora')
                ->where('id_proyecto = ?', $idProyecto)
                ->orderBy('id_bitacora DESC')
                ->limit(1)
                ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        return (empty($q))?"":$q;
    }
}