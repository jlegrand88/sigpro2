<?php

/**
 * DetalleOrdenPago filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleOrdenPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_orden_pago'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'add_empty' => true)),
      'cuenta'                => new sfWidgetFormFilterInput(),
      'nombre_cuenta'         => new sfWidgetFormFilterInput(),
      'presupuesto'           => new sfWidgetFormFilterInput(),
      'ejecucion'             => new sfWidgetFormFilterInput(),
      'compromiso'            => new sfWidgetFormFilterInput(),
      'saldo_efectivo'        => new sfWidgetFormFilterInput(),
      'monto_pago'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_orden_pago'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdenPago'), 'column' => 'id_orden_pago')),
      'cuenta'                => new sfValidatorPass(array('required' => false)),
      'nombre_cuenta'         => new sfValidatorPass(array('required' => false)),
      'presupuesto'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ejecucion'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'compromiso'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'saldo_efectivo'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_pago'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('detalle_orden_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleOrdenPago';
  }

  public function getFields()
  {
    return array(
      'id_detalle_orden_pago' => 'Number',
      'id_orden_pago'         => 'ForeignKey',
      'cuenta'                => 'Text',
      'nombre_cuenta'         => 'Text',
      'presupuesto'           => 'Number',
      'ejecucion'             => 'Number',
      'compromiso'            => 'Number',
      'saldo_efectivo'        => 'Number',
      'monto_pago'            => 'Number',
    );
  }
}
