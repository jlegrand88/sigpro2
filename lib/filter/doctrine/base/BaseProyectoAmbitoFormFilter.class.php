<?php

/**
 * ProyectoAmbito filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProyectoAmbitoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'id_ambito_tematico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmbitoTematico'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_proyecto'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'id_ambito_tematico' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmbitoTematico'), 'column' => 'id_ambito_tematico')),
    ));

    $this->widgetSchema->setNameFormat('proyecto_ambito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoAmbito';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'id_proyecto'        => 'ForeignKey',
      'id_ambito_tematico' => 'ForeignKey',
    );
  }
}
