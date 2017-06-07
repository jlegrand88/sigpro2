<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TipoMovimiento', 'doctrine');

/**
 * BaseTipoMovimiento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_tipo_movimiento
 * @property string $descripcion
 * @property Doctrine_Collection $GastoPais
 * @property Doctrine_Collection $Presupuesto
 * @property Doctrine_Collection $PresupuestoRespaldo
 * 
 * @method integer             getIdTipoMovimiento()    Returns the current record's "id_tipo_movimiento" value
 * @method string              getDescripcion()         Returns the current record's "descripcion" value
 * @method Doctrine_Collection getGastoPais()           Returns the current record's "GastoPais" collection
 * @method Doctrine_Collection getPresupuesto()         Returns the current record's "Presupuesto" collection
 * @method Doctrine_Collection getPresupuestoRespaldo() Returns the current record's "PresupuestoRespaldo" collection
 * @method TipoMovimiento      setIdTipoMovimiento()    Sets the current record's "id_tipo_movimiento" value
 * @method TipoMovimiento      setDescripcion()         Sets the current record's "descripcion" value
 * @method TipoMovimiento      setGastoPais()           Sets the current record's "GastoPais" collection
 * @method TipoMovimiento      setPresupuesto()         Sets the current record's "Presupuesto" collection
 * @method TipoMovimiento      setPresupuestoRespaldo() Sets the current record's "PresupuestoRespaldo" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTipoMovimiento extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tipo_movimiento');
        $this->hasColumn('id_tipo_movimiento', 'integer', 4, array(
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
        $this->hasMany('GastoPais', array(
             'local' => 'id_tipo_movimiento',
             'foreign' => 'id_tipo_movimiento'));

        $this->hasMany('Presupuesto', array(
             'local' => 'id_tipo_movimiento',
             'foreign' => 'id_tipo_movimiento'));

        $this->hasMany('PresupuestoRespaldo', array(
             'local' => 'id_tipo_movimiento',
             'foreign' => 'id_tipo_movimiento'));
    }
}