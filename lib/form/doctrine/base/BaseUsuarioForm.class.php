<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'        => new sfWidgetFormInputHidden(),
      'id_grupo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => false)),
      'rut'               => new sfWidgetFormInputText(),
      'nombre'            => new sfWidgetFormInputText(),
      'apellido_paterno'  => new sfWidgetFormInputText(),
      'apellido_materno'  => new sfWidgetFormInputText(),
      'correo'            => new sfWidgetFormInputText(),
      'password'          => new sfWidgetFormInputText(),
      'id_pais'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'id_grupo_proyecto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => true)),
      'id_perfil_reporte' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'add_empty' => true)),
      'is_active'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_usuario'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_usuario')), 'empty_value' => $this->getObject()->get('id_usuario'), 'required' => false)),
      'id_grupo'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'))),
      'rut'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'apellido_paterno'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'apellido_materno'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'correo'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'password'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_pais'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'required' => false)),
      'id_grupo_proyecto' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'required' => false)),
      'id_perfil_reporte' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'required' => false)),
      'is_active'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
