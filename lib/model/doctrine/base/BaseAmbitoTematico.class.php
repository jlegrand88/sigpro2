<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AmbitoTematico', 'doctrine');

/**
 * BaseAmbitoTematico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_ambito_tematico
 * @property string $descripcion
 * @property Doctrine_Collection $ProyectoAmbito
 * 
 * @method integer             getIdAmbitoTematico()   Returns the current record's "id_ambito_tematico" value
 * @method string              getDescripcion()        Returns the current record's "descripcion" value
 * @method Doctrine_Collection getProyectoAmbito()     Returns the current record's "ProyectoAmbito" collection
 * @method AmbitoTematico      setIdAmbitoTematico()   Sets the current record's "id_ambito_tematico" value
 * @method AmbitoTematico      setDescripcion()        Sets the current record's "descripcion" value
 * @method AmbitoTematico      setProyectoAmbito()     Sets the current record's "ProyectoAmbito" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmbitoTematico extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ambito_tematico');
        $this->hasColumn('id_ambito_tematico', 'integer', 4, array(
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
        $this->hasMany('ProyectoAmbito', array(
             'local' => 'id_ambito_tematico',
             'foreign' => 'id_ambito_tematico'));
    }
}