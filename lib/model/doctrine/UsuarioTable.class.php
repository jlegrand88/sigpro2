<?php

/**
 * UsuarioTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UsuarioTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UsuarioTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Usuario');
    }

    public static function login($email,$password)
    {
        return Doctrine_Query::create()
            ->from('Usuario u')
            ->where('u.correo = ?', array($email))
            ->andWhere('u.password = ?', array(md5($password))) // Podrimos usar otro algoritmo, en este caso utilizamos md5
            ->fetchOne();
    }

    public function getAllUsers()
    {
        $q = Doctrine_Query::create()
            ->select('id_usuario, CONCAT_WS(" ",nombre, apellido_paterno, apellido_materno) as nombre')
            ->from('Usuario')
            ->fetchArray();
        $response = array();
        foreach ($q as $row)
        {
            $response[$row['id_usuario']] = $row['nombre'];
        }

        return $response;
    }
    
    public static function getListaAcciones($idUsuario)
    {
        $q = "SELECT acc.id_accion,acc.nombre FROM usuario usu, grupo gru, perfil per, perfil_accion peracc, accion acc
                where usu.id_grupo = gru.id_grupo and gru.id_perfil = per.id_perfil and per.id_perfil = peracc.id_perfil
                and peracc.id_accion = acc.id_accion and usu.id_usuario = $idUsuario";

        $con = Doctrine_Manager::getInstance()->getConnection('doctrine');
        $response = $con->fetchAssoc($q);
        return $response;
    }

    public static function getListaProyectosResponzable($idUsuario)
    {
        $q = Doctrine_Query::create()
            ->select('id_proyecto, nombre_proyecto_resum')
            ->from('Proyecto')
            ->where('id_responsable_proy = ?',array($idUsuario))
            ->fetchArray();
        $response = array();
        foreach ($q as $row)
        {
            $response[$row['id_proyecto']] = $row['nombre_proyecto_resum'];
        }
        return $response;
    }

    public static function getListaProyectosResponzableGastoPais($idUsuario)
    {
        $q = Doctrine_Query::create()
            ->select('id_proyecto, sigla_contable')
            ->from('Proyecto')
            ->where('id_responsable_proy = ?',array($idUsuario))
            ->fetchArray();
        $response = array();
        foreach ($q as $row)
        {
            $response[$row['id_proyecto']] = $row['sigla_contable'];
        }
        return $response;
    }

}