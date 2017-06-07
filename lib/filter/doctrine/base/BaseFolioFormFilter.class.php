<?php

/**
 * Folio filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFolioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero_actual'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anho_actual'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_documento' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'numero_actual'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'anho_actual'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_tipo_documento' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('folio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Folio';
  }

  public function getFields()
  {
    return array(
      'idfolio'           => 'Number',
      'numero_actual'     => 'Number',
      'anho_actual'       => 'Number',
      'id_tipo_documento' => 'Number',
    );
  }
}
