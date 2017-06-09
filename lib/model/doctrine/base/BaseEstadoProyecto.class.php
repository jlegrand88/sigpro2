<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('EstadoProyecto', 'doctrine');

/**
 * BaseEstadoProyecto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_estado_proyecto
 * @property string $descripcion
 * @property Doctrine_Collection $Accion
 * @property Doctrine_Collection $Accion_2
 * @property Doctrine_Collection $Proyecto
 * 
 * @method integer             getIdEstadoProyecto()   Returns the current record's "id_estado_proyecto" value
 * @method string              getDescripcion()        Returns the current record's "descripcion" value
 * @method Doctrine_Collection getAccion()             Returns the current record's "Accion" collection
 * @method Doctrine_Collection getAccion2()            Returns the current record's "Accion_2" collection
 * @method Doctrine_Collection getProyecto()           Returns the current record's "Proyecto" collection
 * @method EstadoProyecto      setIdEstadoProyecto()   Sets the current record's "id_estado_proyecto" value
 * @method EstadoProyecto      setDescripcion()        Sets the current record's "descripcion" value
 * @method EstadoProyecto      setAccion()             Sets the current record's "Accion" collection
 * @method EstadoProyecto      setAccion2()            Sets the current record's "Accion_2" collection
 * @method EstadoProyecto      setProyecto()           Sets the current record's "Proyecto" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstadoProyecto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estado_proyecto');
        $this->hasColumn('id_estado_proyecto', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('descripcion', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Accion', array(
             'local' => 'id_estado_proyecto',
             'foreign' => 'id_estado_inicial'));

        $this->hasMany('Accion as Accion_2', array(
             'local' => 'id_estado_proyecto',
             'foreign' => 'id_estado_final'));

        $this->hasMany('Proyecto', array(
             'local' => 'id_estado_proyecto',
             'foreign' => 'id_estado_proyecto'));
    }
}