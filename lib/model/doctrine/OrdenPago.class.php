<?php

/**
 * OrdenPago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class OrdenPago extends BaseOrdenPago
{
    public static function getListaProyectos()
    {
        return ProyectoTable::getListaProyectosOrdenPago();
    }

    public function __toString()
    {
        return $this->getIdOrdenPago();
    }
}