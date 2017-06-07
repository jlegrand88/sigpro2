<?php

/**
 * TipoControlProyecto form base class.
 *
 * @method TipoControlProyecto getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipoControlProyectoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_control' => new sfWidgetFormInputHidden(),
      'descripcion'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_tipo_control' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tipo_control')), 'empty_value' => $this->getObject()->get('id_tipo_control'), 'required' => false)),
      'descripcion'     => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('tipo_control_proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoControlProyecto';
  }

}
