<?php

/**
 * ProyectoGrupo form base class.
 *
 * @method ProyectoGrupo getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProyectoGrupoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'       => new sfWidgetFormInputHidden(),
      'id_grupo_proyecto' => new sfWidgetFormInputHidden(),
      'id_usuario'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_proyecto'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proyecto')), 'empty_value' => $this->getObject()->get('id_proyecto'), 'required' => false)),
      'id_grupo_proyecto' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_grupo_proyecto')), 'empty_value' => $this->getObject()->get('id_grupo_proyecto'), 'required' => false)),
      'id_usuario'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_usuario')), 'empty_value' => $this->getObject()->get('id_usuario'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto_grupo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoGrupo';
  }

}
