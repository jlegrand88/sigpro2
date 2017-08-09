<?php

/**
 * Proveedor form base class.
 *
 * @method Proveedor getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProveedorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proveedor'  => new sfWidgetFormInputHidden(),
      'rut_proveedor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'add_empty' => true)),
      'razon_social'  => new sfWidgetFormInputText(),
      'telefono'      => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_proveedor'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proveedor')), 'empty_value' => $this->getObject()->get('id_proveedor'), 'required' => false)),
      'rut_proveedor' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'required' => false)),
      'razon_social'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

}
