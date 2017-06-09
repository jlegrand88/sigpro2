<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PaisTerritorio', 'doctrine');

/**
 * BasePaisTerritorio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_pais_territorio
 * @property integer $id_pais
 * @property integer $id_territorio
 * @property Pais $Pais
 * @property Territorio $Territorio
 * 
 * @method integer        getIdPaisTerritorio()   Returns the current record's "id_pais_territorio" value
 * @method integer        getIdPais()             Returns the current record's "id_pais" value
 * @method integer        getIdTerritorio()       Returns the current record's "id_territorio" value
 * @method Pais           getPais()               Returns the current record's "Pais" value
 * @method Territorio     getTerritorio()         Returns the current record's "Territorio" value
 * @method PaisTerritorio setIdPaisTerritorio()   Sets the current record's "id_pais_territorio" value
 * @method PaisTerritorio setIdPais()             Sets the current record's "id_pais" value
 * @method PaisTerritorio setIdTerritorio()       Sets the current record's "id_territorio" value
 * @method PaisTerritorio setPais()               Sets the current record's "Pais" value
 * @method PaisTerritorio setTerritorio()         Sets the current record's "Territorio" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePaisTerritorio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pais_territorio');
        $this->hasColumn('id_pais_territorio', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_pais', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_territorio', 'integer', 4, array(
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
        $this->hasOne('Pais', array(
             'local' => 'id_pais',
             'foreign' => 'id_pais'));

        $this->hasOne('Territorio', array(
             'local' => 'id_territorio',
             'foreign' => 'id_territorio'));
    }
}