<?php

/**
 * Parametro form base class.
 *
 * @method Parametro getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParametroForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_parametro' => new sfWidgetFormInputHidden(),
      'id_hijo'      => new sfWidgetFormInputText(),
      'id_padre'     => new sfWidgetFormInputText(),
      'descripcion'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_parametro' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_parametro')), 'empty_value' => $this->getObject()->get('id_parametro'), 'required' => false)),
      'id_hijo'      => new sfValidatorInteger(array('required' => false)),
      'id_padre'     => new sfValidatorInteger(array('required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }

}
