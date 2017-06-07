<?php

/**
 * MovimientosContables form base class.
 *
 * @method MovimientosContables getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMovimientosContablesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'codigo_cuenta'      => new sfWidgetFormInputText(),
      'nombre_cuenta'      => new sfWidgetFormInputText(),
      'proyecto'           => new sfWidgetFormInputText(),
      'numero_comprobante' => new sfWidgetFormInputText(),
      'fecha'              => new sfWidgetFormDate(),
      'mes'                => new sfWidgetFormInputText(),
      'anho'               => new sfWidgetFormInputText(),
      'glosa'              => new sfWidgetFormTextarea(),
      'dolares'            => new sfWidgetFormInputText(),
      'pesos'              => new sfWidgetFormInputText(),
      'id_tipo_cuenta'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'codigo_cuenta'      => new sfValidatorString(array('max_length' => 60)),
      'nombre_cuenta'      => new sfValidatorString(array('max_length' => 150)),
      'proyecto'           => new sfValidatorInteger(),
      'numero_comprobante' => new sfValidatorString(array('max_length' => 15)),
      'fecha'              => new sfValidatorDate(array('required' => false)),
      'mes'                => new sfValidatorString(array('max_length' => 2)),
      'anho'               => new sfValidatorString(array('max_length' => 4)),
      'glosa'              => new sfValidatorString(array('max_length' => 500)),
      'dolares'            => new sfValidatorNumber(),
      'pesos'              => new sfValidatorNumber(),
      'id_tipo_cuenta'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('movimientos_contables[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MovimientosContables';
  }

}
