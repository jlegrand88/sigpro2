<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ArchivoOrdenPago', 'doctrine');

/**
 * BaseArchivoOrdenPago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_archivo_orden_pago
 * @property integer $id_orden_pago
 * @property string $nombre
 * @property string $archivo
 * @property string $ruta
 * @property date $fecha_upload
 * @property OrdenPago $OrdenPago
 * 
 * @method integer          getIdArchivoOrdenPago()    Returns the current record's "id_archivo_orden_pago" value
 * @method integer          getIdOrdenPago()           Returns the current record's "id_orden_pago" value
 * @method string           getNombre()                Returns the current record's "nombre" value
 * @method string           getArchivo()               Returns the current record's "archivo" value
 * @method string           getRuta()                  Returns the current record's "ruta" value
 * @method date             getFechaUpload()           Returns the current record's "fecha_upload" value
 * @method OrdenPago        getOrdenPago()             Returns the current record's "OrdenPago" value
 * @method ArchivoOrdenPago setIdArchivoOrdenPago()    Sets the current record's "id_archivo_orden_pago" value
 * @method ArchivoOrdenPago setIdOrdenPago()           Sets the current record's "id_orden_pago" value
 * @method ArchivoOrdenPago setNombre()                Sets the current record's "nombre" value
 * @method ArchivoOrdenPago setArchivo()               Sets the current record's "archivo" value
 * @method ArchivoOrdenPago setRuta()                  Sets the current record's "ruta" value
 * @method ArchivoOrdenPago setFechaUpload()           Sets the current record's "fecha_upload" value
 * @method ArchivoOrdenPago setOrdenPago()             Sets the current record's "OrdenPago" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArchivoOrdenPago extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('archivo_orden_pago');
        $this->hasColumn('id_archivo_orden_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_orden_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('archivo', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('ruta', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('fecha_upload', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrdenPago', array(
             'local' => 'id_orden_pago',
             'foreign' => 'id_orden_pago'));
    }
}