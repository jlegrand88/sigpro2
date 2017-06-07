<?php

/**
 * AmbitoTematico form base class.
 *
 * @method AmbitoTematico getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmbitoTematicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ambito_tematico' => new sfWidgetFormInputHidden(),
      'descripcion'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ambito_tematico' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_ambito_tematico')), 'empty_value' => $this->getObject()->get('id_ambito_tematico'), 'required' => false)),
      'descripcion'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ambito_tematico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmbitoTematico';
  }

}
