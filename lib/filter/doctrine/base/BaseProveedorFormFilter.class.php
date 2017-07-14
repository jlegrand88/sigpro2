<?php

/**
 * Proveedor filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rut_proveedor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'razon_social'  => new sfWidgetFormFilterInput(),
      'telefono'      => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rut_proveedor' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'razon_social'  => new sfValidatorPass(array('required' => false)),
      'telefono'      => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

  public function getFields()
  {
    return array(
      'id_proveedor'  => 'Number',
      'rut_proveedor' => 'ForeignKey',
      'razon_social'  => 'Text',
      'telefono'      => 'Text',
      'email'         => 'Text',
    );
  }
}
