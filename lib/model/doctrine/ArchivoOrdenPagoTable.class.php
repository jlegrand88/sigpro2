<?php

/**
 * ArchivoOrdenPagoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArchivoOrdenPagoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArchivoOrdenPagoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArchivoOrdenPago');
    }

    public function getIdArchivoDelete($idOrdenPago)
    {
        return Doctrine_Query::create()
            ->select('id_archivo_orden_pago')
            ->from('ArchivoOrdenPago')
            ->where('id_orden_pago = ?',array($idOrdenPago))
            ->orderBy('id_archivo_orden_pago DESC')
            ->limit(1)
            ->execute(array(),Doctrine_Core::HYDRATE_SINGLE_SCALAR);
    }
}