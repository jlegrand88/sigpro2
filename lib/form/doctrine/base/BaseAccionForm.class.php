<?php

/**
 * Accion form base class.
 *
 * @method Accion getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAccionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_accion'         => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInputText(),
      'id_estado_inicial' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'add_empty' => true)),
      'id_estado_final'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto_2'), 'add_empty' => true)),
      'pregunta'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_accion'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_accion')), 'empty_value' => $this->getObject()->get('id_accion'), 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_estado_inicial' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'required' => false)),
      'id_estado_final'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto_2'), 'required' => false)),
      'pregunta'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('accion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Accion';
  }

}
