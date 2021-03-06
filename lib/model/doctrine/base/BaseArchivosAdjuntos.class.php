<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ArchivosAdjuntos', 'doctrine');

/**
 * BaseArchivosAdjuntos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_archivo
 * @property integer $folio
 * @property integer $id_proyecto
 * @property integer $id_usuario
 * @property string $nombre_archivo
 * @property string $extension
 * @property string $ruta
 * @property timestamp $fecha
 * @property string $kilobytes
 * @property integer $id_tipo_documento
 * 
 * @method integer          getIdArchivo()         Returns the current record's "id_archivo" value
 * @method integer          getFolio()             Returns the current record's "folio" value
 * @method integer          getIdProyecto()        Returns the current record's "id_proyecto" value
 * @method integer          getIdUsuario()         Returns the current record's "id_usuario" value
 * @method string           getNombreArchivo()     Returns the current record's "nombre_archivo" value
 * @method string           getExtension()         Returns the current record's "extension" value
 * @method string           getRuta()              Returns the current record's "ruta" value
 * @method timestamp        getFecha()             Returns the current record's "fecha" value
 * @method string           getKilobytes()         Returns the current record's "kilobytes" value
 * @method integer          getIdTipoDocumento()   Returns the current record's "id_tipo_documento" value
 * @method ArchivosAdjuntos setIdArchivo()         Sets the current record's "id_archivo" value
 * @method ArchivosAdjuntos setFolio()             Sets the current record's "folio" value
 * @method ArchivosAdjuntos setIdProyecto()        Sets the current record's "id_proyecto" value
 * @method ArchivosAdjuntos setIdUsuario()         Sets the current record's "id_usuario" value
 * @method ArchivosAdjuntos setNombreArchivo()     Sets the current record's "nombre_archivo" value
 * @method ArchivosAdjuntos setExtension()         Sets the current record's "extension" value
 * @method ArchivosAdjuntos setRuta()              Sets the current record's "ruta" value
 * @method ArchivosAdjuntos setFecha()             Sets the current record's "fecha" value
 * @method ArchivosAdjuntos setKilobytes()         Sets the current record's "kilobytes" value
 * @method ArchivosAdjuntos setIdTipoDocumento()   Sets the current record's "id_tipo_documento" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArchivosAdjuntos extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('archivos_adjuntos');
        $this->hasColumn('id_archivo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('folio', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
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
        $this->hasColumn('id_usuario', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nombre_archivo', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('extension', 'string', 45, array(
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
        $this->hasColumn('kilobytes', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('id_tipo_documento', 'integer', 4, array(
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
        
    }
}