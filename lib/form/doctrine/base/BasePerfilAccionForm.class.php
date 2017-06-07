<?php

/**
 * PerfilAccion form base class.
 *
 * @method PerfilAccion getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePerfilAccionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_perfil' => new sfWidgetFormInputHidden(),
      'id_accion' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_perfil' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_perfil')), 'empty_value' => $this->getObject()->get('id_perfil'), 'required' => false)),
      'id_accion' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_accion')), 'empty_value' => $this->getObject()->get('id_accion'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfil_accion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PerfilAccion';
  }

}
