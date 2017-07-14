<?php

/**
 * Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Usuario extends BaseUsuario
{
    public function __toString()
    {
        return $this->getNombreCompleto();
    }

    public function getNombreCompleto()
    {
        return trim($this->getNombre()." ".$this->getApellidoPaterno()." ".$this->getApellidoMaterno());
    }

//    public static function getPermisos($idUsuario)
//    {
//        $usuario = UsuarioTable::getInstance()->findOneByIdUsuario($idUsuario);
//        $acciones = $usuario->getPerfil()->getPerfilAccion();
//        $permisos = array();
//        foreach ($acciones as $accion)
//        {
//            $permisos[] = $accion->getIdAccion();
//        }
//        return $permisos;
//    }
    public static function getPermisos($idUsuario)
    {
        return UsuarioTable::getInstance()->getPermisos($idUsuario);
    }

    public static function validarClave($idUsuario,$password)
    {
        $usuario = UsuarioTable::getInstance()->find($idUsuario);
        if($usuario->getPassword() == md5($password )) {
            return true;
        }
        else{
            return false;
        }
    }
}