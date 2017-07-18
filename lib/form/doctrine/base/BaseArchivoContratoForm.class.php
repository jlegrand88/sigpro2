<?php

/**
 * ArchivoContrato form base class.
 *
 * @method ArchivoContrato getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchivoContratoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_archivo_contrato' => new sfWidgetFormInputHidden(),
      'id_proyecto'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => false)),
      'nombre'              => new sfWidgetFormInputText(),
      'archivo'             => new sfWidgetFormInputText(),
      'ruta'                => new sfWidgetFormInputText(),
      'fecha'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_archivo_contrato' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_archivo_contrato')), 'empty_value' => $this->getObject()->get('id_archivo_contrato'), 'required' => false)),
      'id_proyecto'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'))),
      'nombre'              => new sfValidatorString(array('max_length' => 45)),
      'archivo'             => new sfValidatorString(array('max_length' => 255)),
      'ruta'                => new sfValidatorString(array('max_length' => 255)),
      'fecha'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('archivo_contrato[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoContrato';
  }

}
