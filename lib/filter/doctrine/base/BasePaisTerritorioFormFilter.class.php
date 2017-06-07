<?php

/**
 * PaisTerritorio filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePaisTerritorioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pais'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'id_territorio'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Territorio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_pais'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pais'), 'column' => 'id_pais')),
      'id_territorio'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Territorio'), 'column' => 'id_territorio')),
    ));

    $this->widgetSchema->setNameFormat('pais_territorio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaisTerritorio';
  }

  public function getFields()
  {
    return array(
      'id_pais_territorio' => 'Number',
      'id_pais'            => 'ForeignKey',
      'id_territorio'      => 'ForeignKey',
    );
  }
}
