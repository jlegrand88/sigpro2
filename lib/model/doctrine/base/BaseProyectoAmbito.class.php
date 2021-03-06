<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProyectoAmbito', 'doctrine');

/**
 * BaseProyectoAmbito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_proyecto
 * @property integer $id_ambito_tematico
 * @property AmbitoTematico $AmbitoTematico
 * @property Proyecto $Proyecto
 * 
 * @method integer        getId()                 Returns the current record's "id" value
 * @method integer        getIdProyecto()         Returns the current record's "id_proyecto" value
 * @method integer        getIdAmbitoTematico()   Returns the current record's "id_ambito_tematico" value
 * @method AmbitoTematico getAmbitoTematico()     Returns the current record's "AmbitoTematico" value
 * @method Proyecto       getProyecto()           Returns the current record's "Proyecto" value
 * @method ProyectoAmbito setId()                 Sets the current record's "id" value
 * @method ProyectoAmbito setIdProyecto()         Sets the current record's "id_proyecto" value
 * @method ProyectoAmbito setIdAmbitoTematico()   Sets the current record's "id_ambito_tematico" value
 * @method ProyectoAmbito setAmbitoTematico()     Sets the current record's "AmbitoTematico" value
 * @method ProyectoAmbito setProyecto()           Sets the current record's "Proyecto" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProyectoAmbito extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('proyecto_ambito');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_proyecto', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_ambito_tematico', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmbitoTematico', array(
             'local' => 'id_ambito_tematico',
             'foreign' => 'id_ambito_tematico'));

        $this->hasOne('Proyecto', array(
             'local' => 'id_proyecto',
             'foreign' => 'id_proyecto'));
    }
}