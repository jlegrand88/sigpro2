<?php

/**
 * ProveedorTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProveedorTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProveedorTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Proveedor');
    }

    public function getListaProveedores()
    {
        $q = Doctrine_Query::create()
            ->select('rut_proveedor, upper(razon_social) descripcion')
            ->from('Proveedor')
            ->orderBy('razon_social ASC')
            ->fetchArray();
        $response = array("" => "");
        foreach ($q as $row)
        {
            $response[$row['rut_proveedor']] = $row['descripcion'];
        }
        return $response;
    }
}