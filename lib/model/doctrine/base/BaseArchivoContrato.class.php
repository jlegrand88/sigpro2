<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ArchivoContrato', 'doctrine');

/**
 * BaseArchivoContrato
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_archivo_contrato
 * @property integer $id_proyecto
 * @property string $nombre
 * @property string $archivo
 * @property string $ruta
 * @property timestamp $fecha
 * @property Proyecto $Proyecto
 * 
 * @method integer         getIdArchivoContrato()   Returns the current record's "id_archivo_contrato" value
 * @method integer         getIdProyecto()          Returns the current record's "id_proyecto" value
 * @method string          getNombre()              Returns the current record's "nombre" value
 * @method string          getArchivo()             Returns the current record's "archivo" value
 * @method string          getRuta()                Returns the current record's "ruta" value
 * @method timestamp       getFecha()               Returns the current record's "fecha" value
 * @method Proyecto        getProyecto()            Returns the current record's "Proyecto" value
 * @method ArchivoContrato setIdArchivoContrato()   Sets the current record's "id_archivo_contrato" value
 * @method ArchivoContrato setIdProyecto()          Sets the current record's "id_proyecto" value
 * @method ArchivoContrato setNombre()              Sets the current record's "nombre" value
 * @method ArchivoContrato setArchivo()             Sets the current record's "archivo" value
 * @method ArchivoContrato setRuta()                Sets the current record's "ruta" value
 * @method ArchivoContrato setFecha()               Sets the current record's "fecha" value
 * @method ArchivoContrato setProyecto()            Sets the current record's "Proyecto" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArchivoContrato extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('archivo_contrato');
        $this->hasColumn('id_archivo_contrato', 'integer', 4, array(
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
        $this->hasColumn('nombre', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('archivo', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('ruta', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('fecha', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Proyecto', array(
             'local' => 'id_proyecto',
             'foreign' => 'id_proyecto'));
    }
}