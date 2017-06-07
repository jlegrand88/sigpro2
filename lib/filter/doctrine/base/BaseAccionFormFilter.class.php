<?php

/**
 * Accion filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAccionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'id_estado_inicial' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'add_empty' => true)),
      'id_estado_final'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto_2'), 'add_empty' => true)),
      'pregunta'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'id_estado_inicial' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoProyecto'), 'column' => 'id_estado_proyecto')),
      'id_estado_final'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoProyecto_2'), 'column' => 'id_estado_proyecto')),
      'pregunta'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('accion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Accion';
  }

  public function getFields()
  {
    return array(
      'id_accion'         => 'Number',
      'nombre'            => 'Text',
      'id_estado_inicial' => 'ForeignKey',
      'id_estado_final'   => 'ForeignKey',
      'pregunta'          => 'Text',
    );
  }
}
