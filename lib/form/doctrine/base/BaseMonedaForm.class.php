<?php

/**
 * Moneda form base class.
 *
 * @method Moneda getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMonedaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_moneda'   => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'codigo'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_moneda'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_moneda')), 'empty_value' => $this->getObject()->get('id_moneda'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'codigo'      => new sfValidatorString(array('max_length' => 4, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('moneda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moneda';
  }

}
