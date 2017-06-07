<?php

/**
 * Parametro filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParametroFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_hijo'      => new sfWidgetFormFilterInput(),
      'id_padre'     => new sfWidgetFormFilterInput(),
      'descripcion'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_hijo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_padre'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descripcion'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }

  public function getFields()
  {
    return array(
      'id_parametro' => 'Number',
      'id_hijo'      => 'Number',
      'id_padre'     => 'Number',
      'descripcion'  => 'Text',
    );
  }
}
