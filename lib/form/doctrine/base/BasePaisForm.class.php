<?php

/**
 * Pais form base class.
 *
 * @method Pais getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pais'     => new sfWidgetFormInputHidden(),
      'codigo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pais'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pais')), 'empty_value' => $this->getObject()->get('id_pais'), 'required' => false)),
      'codigo'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pais';
  }

}
