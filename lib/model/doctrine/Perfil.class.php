<?php

/**
 * Perfil
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Perfil extends BasePerfil
{
    const ADMINISTRADOR = 1;
    const CONTADOR = 2;
    const CREADOR_FICHA = 3;
    const APROBADOR_FICHA = 4;
    const OFICINA = 5;
    const VISUALIZADOR = 6;
    const RESPONSABLE = 7;
    const GRUPO = 8;
    const GENERAL = 9;

    public function __toString()
    {
        return $this->getDescripcion();
    }

}