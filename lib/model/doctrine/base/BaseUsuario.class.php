<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Usuario', 'doctrine');

/**
 * BaseUsuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_usuario
 * @property integer $id_grupo
 * @property string $rut
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $correo
 * @property string $password
 * @property integer $id_pais
 * @property integer $id_grupo_proyecto
 * @property integer $id_perfil_reporte
 * @property integer $is_active
 * @property Grupo $Grupo
 * @property GrupoProyecto $GrupoProyecto
 * @property Pais $Pais
 * @property Perfil $Perfil
 * @property Doctrine_Collection $ArchivoGastoPais
 * @property Doctrine_Collection $Bitacora
 * @property Doctrine_Collection $Inbox
 * @property Doctrine_Collection $Outbox
 * @property Doctrine_Collection $OrdenPago
 * @property Doctrine_Collection $ProyectoCreador
 * @property Doctrine_Collection $ProyectoResponsableProy
 * @property Doctrine_Collection $ProyectoResponsableCont
 * @property Doctrine_Collection $ProyectoGrupo
 * 
 * @method integer             getIdUsuario()               Returns the current record's "id_usuario" value
 * @method integer             getIdGrupo()                 Returns the current record's "id_grupo" value
 * @method string              getRut()                     Returns the current record's "rut" value
 * @method string              getNombre()                  Returns the current record's "nombre" value
 * @method string              getApellidoPaterno()         Returns the current record's "apellido_paterno" value
 * @method string              getApellidoMaterno()         Returns the current record's "apellido_materno" value
 * @method string              getCorreo()                  Returns the current record's "correo" value
 * @method string              getPassword()                Returns the current record's "password" value
 * @method integer             getIdPais()                  Returns the current record's "id_pais" value
 * @method integer             getIdGrupoProyecto()         Returns the current record's "id_grupo_proyecto" value
 * @method integer             getIdPerfilReporte()         Returns the current record's "id_perfil_reporte" value
 * @method integer             getIsActive()                Returns the current record's "is_active" value
 * @method Grupo               getGrupo()                   Returns the current record's "Grupo" value
 * @method GrupoProyecto       getGrupoProyecto()           Returns the current record's "GrupoProyecto" value
 * @method Pais                getPais()                    Returns the current record's "Pais" value
 * @method Perfil              getPerfil()                  Returns the current record's "Perfil" value
 * @method Doctrine_Collection getArchivoGastoPais()        Returns the current record's "ArchivoGastoPais" collection
 * @method Doctrine_Collection getBitacora()                Returns the current record's "Bitacora" collection
 * @method Doctrine_Collection getInbox()                   Returns the current record's "Inbox" collection
 * @method Doctrine_Collection getOutbox()                  Returns the current record's "Outbox" collection
 * @method Doctrine_Collection getOrdenPago()               Returns the current record's "OrdenPago" collection
 * @method Doctrine_Collection getProyectoCreador()         Returns the current record's "ProyectoCreador" collection
 * @method Doctrine_Collection getProyectoResponsableProy() Returns the current record's "ProyectoResponsableProy" collection
 * @method Doctrine_Collection getProyectoResponsableCont() Returns the current record's "ProyectoResponsableCont" collection
 * @method Doctrine_Collection getProyectoGrupo()           Returns the current record's "ProyectoGrupo" collection
 * @method Usuario             setIdUsuario()               Sets the current record's "id_usuario" value
 * @method Usuario             setIdGrupo()                 Sets the current record's "id_grupo" value
 * @method Usuario             setRut()                     Sets the current record's "rut" value
 * @method Usuario             setNombre()                  Sets the current record's "nombre" value
 * @method Usuario             setApellidoPaterno()         Sets the current record's "apellido_paterno" value
 * @method Usuario             setApellidoMaterno()         Sets the current record's "apellido_materno" value
 * @method Usuario             setCorreo()                  Sets the current record's "correo" value
 * @method Usuario             setPassword()                Sets the current record's "password" value
 * @method Usuario             setIdPais()                  Sets the current record's "id_pais" value
 * @method Usuario             setIdGrupoProyecto()         Sets the current record's "id_grupo_proyecto" value
 * @method Usuario             setIdPerfilReporte()         Sets the current record's "id_perfil_reporte" value
 * @method Usuario             setIsActive()                Sets the current record's "is_active" value
 * @method Usuario             setGrupo()                   Sets the current record's "Grupo" value
 * @method Usuario             setGrupoProyecto()           Sets the current record's "GrupoProyecto" value
 * @method Usuario             setPais()                    Sets the current record's "Pais" value
 * @method Usuario             setPerfil()                  Sets the current record's "Perfil" value
 * @method Usuario             setArchivoGastoPais()        Sets the current record's "ArchivoGastoPais" collection
 * @method Usuario             setBitacora()                Sets the current record's "Bitacora" collection
 * @method Usuario             setInbox()                   Sets the current record's "Inbox" collection
 * @method Usuario             setOutbox()                  Sets the current record's "Outbox" collection
 * @method Usuario             setOrdenPago()               Sets the current record's "OrdenPago" collection
 * @method Usuario             setProyectoCreador()         Sets the current record's "ProyectoCreador" collection
 * @method Usuario             setProyectoResponsableProy() Sets the current record's "ProyectoResponsableProy" collection
 * @method Usuario             setProyectoResponsableCont() Sets the current record's "ProyectoResponsableCont" collection
 * @method Usuario             setProyectoGrupo()           Sets the current record's "ProyectoGrupo" collection
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsuario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('id_usuario', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_grupo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rut', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
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
        $this->hasColumn('apellido_paterno', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('apellido_materno', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('correo', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('password', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('id_pais', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_grupo_proyecto', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_perfil_reporte', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_active', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Grupo', array(
             'local' => 'id_grupo',
             'foreign' => 'id_grupo'));

        $this->hasOne('GrupoProyecto', array(
             'local' => 'id_grupo_proyecto',
             'foreign' => 'id_grupo_proyecto'));

        $this->hasOne('Pais', array(
             'local' => 'id_pais',
             'foreign' => 'id_pais'));

        $this->hasOne('Perfil', array(
             'local' => 'id_perfil_reporte',
             'foreign' => 'id_perfil'));

        $this->hasMany('ArchivoGastoPais', array(
             'local' => 'id_usuario',
             'foreign' => 'id_usuario'));

        $this->hasMany('Bitacora', array(
             'local' => 'id_usuario',
             'foreign' => 'id_usuario'));

        $this->hasMany('Inbox', array(
             'local' => 'id_usuario',
             'foreign' => 'id_destinatario'));

        $this->hasMany('Inbox as Outbox', array(
             'local' => 'id_usuario',
             'foreign' => 'id_emisor'));

        $this->hasMany('OrdenPago', array(
             'local' => 'id_usuario',
             'foreign' => 'id_usuario'));

        $this->hasMany('Proyecto as ProyectoCreador', array(
             'local' => 'id_usuario',
             'foreign' => 'id_creador'));

        $this->hasMany('Proyecto as ProyectoResponsableProy', array(
             'local' => 'id_usuario',
             'foreign' => 'id_responsable_proy'));

        $this->hasMany('Proyecto as ProyectoResponsableCont', array(
             'local' => 'id_usuario',
             'foreign' => 'id_responsable_cont'));

        $this->hasMany('ProyectoGrupo', array(
             'local' => 'id_usuario',
             'foreign' => 'id_usuario'));
    }
}