<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DetalleOrdenPago', 'doctrine');

/**
 * BaseDetalleOrdenPago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_detalle_orden_pago
 * @property integer $id_orden_pago
 * @property string $cuenta
 * @property string $nombre_cuenta
 * @property decimal $presupuesto
 * @property decimal $ejecucion
 * @property decimal $compromiso
 * @property decimal $saldo_efectivo
 * @property decimal $monto_pago
 * @property OrdenPago $OrdenPago
 * 
 * @method integer          getIdDetalleOrdenPago()    Returns the current record's "id_detalle_orden_pago" value
 * @method integer          getIdOrdenPago()           Returns the current record's "id_orden_pago" value
 * @method string           getCuenta()                Returns the current record's "cuenta" value
 * @method string           getNombreCuenta()          Returns the current record's "nombre_cuenta" value
 * @method decimal          getPresupuesto()           Returns the current record's "presupuesto" value
 * @method decimal          getEjecucion()             Returns the current record's "ejecucion" value
 * @method decimal          getCompromiso()            Returns the current record's "compromiso" value
 * @method decimal          getSaldoEfectivo()         Returns the current record's "saldo_efectivo" value
 * @method decimal          getMontoPago()             Returns the current record's "monto_pago" value
 * @method OrdenPago        getOrdenPago()             Returns the current record's "OrdenPago" value
 * @method DetalleOrdenPago setIdDetalleOrdenPago()    Sets the current record's "id_detalle_orden_pago" value
 * @method DetalleOrdenPago setIdOrdenPago()           Sets the current record's "id_orden_pago" value
 * @method DetalleOrdenPago setCuenta()                Sets the current record's "cuenta" value
 * @method DetalleOrdenPago setNombreCuenta()          Sets the current record's "nombre_cuenta" value
 * @method DetalleOrdenPago setPresupuesto()           Sets the current record's "presupuesto" value
 * @method DetalleOrdenPago setEjecucion()             Sets the current record's "ejecucion" value
 * @method DetalleOrdenPago setCompromiso()            Sets the current record's "compromiso" value
 * @method DetalleOrdenPago setSaldoEfectivo()         Sets the current record's "saldo_efectivo" value
 * @method DetalleOrdenPago setMontoPago()             Sets the current record's "monto_pago" value
 * @method DetalleOrdenPago setOrdenPago()             Sets the current record's "OrdenPago" value
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDetalleOrdenPago extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_orden_pago');
        $this->hasColumn('id_detalle_orden_pago', 'integer', 4, array(
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
        $this->hasColumn('cuenta', 'string', 11, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             ));
        $this->hasColumn('nombre_cuenta', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('presupuesto', 'decimal', 11, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             'scale' => '2',
             ));
        $this->hasColumn('ejecucion', 'decimal', 11, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             'scale' => '2',
             ));
        $this->hasColumn('compromiso', 'decimal', 11, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             'scale' => '2',
             ));
        $this->hasColumn('saldo_efectivo', 'decimal', 11, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             'scale' => '2',
             ));
        $this->hasColumn('monto_pago', 'decimal', 11, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 11,
             'scale' => '2',
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