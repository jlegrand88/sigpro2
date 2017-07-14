<?php

/**
 * OrdenPago form base class.
 *
 * @method OrdenPago getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrdenPagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_orden_pago'       => new sfWidgetFormInputHidden(),
      'folio'               => new sfWidgetFormInputText(),
      'id_moneda'           => new sfWidgetFormInputText(),
      'id_proyecto'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'id_usuario'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'rut_proveedor'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'fecha_ingreso'       => new sfWidgetFormDateTime(),
      'fecha_contabilizado' => new sfWidgetFormDateTime(),
      'observacion'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_orden_pago'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_orden_pago')), 'empty_value' => $this->getObject()->get('id_orden_pago'), 'required' => false)),
      'folio'               => new sfValidatorInteger(array('required' => false)),
      'id_moneda'           => new sfValidatorInteger(array('required' => false)),
      'id_proyecto'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'required' => false)),
      'id_usuario'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'required' => false)),
      'rut_proveedor'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'required' => false)),
      'fecha_ingreso'       => new sfValidatorDateTime(array('required' => false)),
      'fecha_contabilizado' => new sfValidatorDateTime(array('required' => false)),
      'observacion'         => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('orden_pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrdenPago';
  }

}
