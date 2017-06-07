<?php

/**
 * Grupo form base class.
 *
 * @method Grupo getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGrupoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_grupo'    => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'id_perfil'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_grupo'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_grupo')), 'empty_value' => $this->getObject()->get('id_grupo'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_perfil'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'))),
    ));

    $this->widgetSchema->setNameFormat('grupo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grupo';
  }

}
