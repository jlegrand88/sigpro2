<?php

/**
 * ArchivoGastoPais form base class.
 *
 * @method ArchivoGastoPais getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchivoGastoPaisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_archivo_gasto_pais' => new sfWidgetFormInputHidden(),
      'id_usuario'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'nombre'                => new sfWidgetFormInputText(),
      'ruta'                  => new sfWidgetFormInputText(),
      'fecha'                 => new sfWidgetFormDateTime(),
      'vigente'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_archivo_gasto_pais' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_archivo_gasto_pais')), 'empty_value' => $this->getObject()->get('id_archivo_gasto_pais'), 'required' => false)),
      'id_usuario'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'nombre'                => new sfValidatorString(array('max_length' => 45)),
      'ruta'                  => new sfValidatorString(array('max_length' => 255)),
      'fecha'                 => new sfValidatorDateTime(),
      'vigente'               => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('archivo_gasto_pais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoGastoPais';
  }

}
