<?php

/**
 * ArchivoGastoPaisTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArchivoGastoPaisTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArchivoGastoPaisTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArchivoGastoPais');
    }

    public static function getArchivos($idProyecto,$idUsuario)
    {
        $q = Doctrine_Query::create()
            ->select('gp.id_gasto_pais,agp.id_archivo_gasto_pais')
            ->from('ArchivoGastoPais agp')
            ->innerJoin('agp.GastoPais gp')
            ->where('gp.id_proyecto = ?',array($idProyecto))
            ->andWhere('agp.id_usuario = ?',array($idUsuario))
            ->groupBy('gp.id_archivo_gasto_pais');
        $response = $q->execute();
        return $response;
    }
}