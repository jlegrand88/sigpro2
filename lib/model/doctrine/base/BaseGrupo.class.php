<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Grupo', 'doctrine');

/**
 * BaseGrupo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_grupo
 * @property string $descripcion
 * @property integer $id_perfil
 * @property Perfil $Perfil
 * @property Doctrine_Collection $Usuario
 * 
 * @method integer             getIdGrupo()     Returns the current record's "id_grupo" value
 * @method string              getDescripcion() Returns the current record's "descripcion" value
 * @method integer             getIdPerfil()    Returns the current record's "id_perfil" value
 * @method Perfil              getPerfil()      Returns the current record's "Perfil" value
 * @method Doctrine_Collection getUsuario()     Returns the current record's "Usuario" collection
 * @method Grupo               setIdGrupo()     Sets the current record's "id_grupo" value
 * @method Grupo               setDescripcion() Sets the current record's "descripcion" value
 * @method Grupo               setIdPerfil()    Sets the current record's "id_perfil" value
 * @method Grupo               setPerfil()      Sets the current record's "Perfil" value
 * @method Grupo               setUsuario()     Sets the current record's "Usuario" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGrupo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('grupo');
        $this->hasColumn('id_grupo', 'integer', 4, array(
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
        $this->hasColumn('id_perfil', 'integer', 4, array(
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
        $this->hasOne('Perfil', array(
             'local' => 'id_perfil',
             'foreign' => 'id_perfil'));

        $this->hasMany('Usuario', array(
             'local' => 'id_grupo',
             'foreign' => 'id_grupo'));
    }
}