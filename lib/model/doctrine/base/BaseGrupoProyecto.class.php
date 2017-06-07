<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GrupoProyecto', 'doctrine');

/**
 * BaseGrupoProyecto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_grupo_proyecto
 * @property string $descripcion
 * @property Doctrine_Collection $Proyecto
 * @property Doctrine_Collection $ProyectoGrupo
 * @property Doctrine_Collection $Usuario
 * 
 * @method integer             getIdGrupoProyecto()   Returns the current record's "id_grupo_proyecto" value
 * @method string              getDescripcion()       Returns the current record's "descripcion" value
 * @method Doctrine_Collection getProyecto()          Returns the current record's "Proyecto" collection
 * @method Doctrine_Collection getProyectoGrupo()     Returns the current record's "ProyectoGrupo" collection
 * @method Doctrine_Collection getUsuario()           Returns the current record's "Usuario" collection
 * @method GrupoProyecto       setIdGrupoProyecto()   Sets the current record's "id_grupo_proyecto" value
 * @method GrupoProyecto       setDescripcion()       Sets the current record's "descripcion" value
 * @method GrupoProyecto       setProyecto()          Sets the current record's "Proyecto" collection
 * @method GrupoProyecto       setProyectoGrupo()     Sets the current record's "ProyectoGrupo" collection
 * @method GrupoProyecto       setUsuario()           Sets the current record's "Usuario" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGrupoProyecto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('grupo_proyecto');
        $this->hasColumn('id_grupo_proyecto', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('descripcion', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Proyecto', array(
             'local' => 'id_grupo_proyecto',
             'foreign' => 'id_grupo_proyecto'));

        $this->hasMany('ProyectoGrupo', array(
             'local' => 'id_grupo_proyecto',
             'foreign' => 'id_grupo_proyecto'));

        $this->hasMany('Usuario', array(
             'local' => 'id_grupo_proyecto',
             'foreign' => 'id_grupo_proyecto'));
    }
}