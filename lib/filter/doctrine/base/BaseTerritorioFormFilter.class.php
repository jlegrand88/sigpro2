<?php

/**
 * Territorio filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTerritorioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'        => new sfWidgetFormFilterInput(),
      'descripcion'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo'        => new sfValidatorPass(array('required' => false)),
      'descripcion'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('territorio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Territorio';
  }

  public function getFields()
  {
    return array(
      'id_territorio' => 'Number',
      'codigo'        => 'Text',
      'descripcion'   => 'Text',
    );
  }
}
