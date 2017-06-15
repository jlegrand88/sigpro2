<?php

/**
 * DetalleOrdenPago form base class.
 *
 * @method DetalleOrdenPago getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleOrdenPagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_detalle_orden_pago' => new sfWidgetFormInputHidden(),
      'id_orden_pago'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'add_empty' => true)),
      'cuenta'                => new sfWidgetFormInputText(),
      'nombre_cuenta'         => new sfWidgetFormInputText(),
      'presupuesto'           => new sfWidgetFormInputText(),
      'ejecucion'             => new sfWidgetFormInputText(),
      'compromiso'            => new sfWidgetFormInputText(),
      'saldo_efectivo'        => new sfWidgetFormInputText(),
      'monto_pago'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_detalle_orden_pago' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_orden_pago')), 'empty_value' => $this->getObject()->get('id_detalle_orden_pago'), 'required' => false)),
      'id_orden_pago'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'required' => false)),
      'cuenta'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre_cuenta'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'presupuesto'           => new sfValidatorNumber(array('required' => false)),
      'ejecucion'             => new sfValidatorNumber(array('required' => false)),
      'compromiso'            => new sfValidatorNumber(array('required' => false)),
      'saldo_efectivo'        => new sfValidatorNumber(array('required' => false)),
      'monto_pago'            => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_orden_pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleOrdenPago';
  }

}
