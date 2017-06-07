<?php

/**
 * ArchivosAdjuntos form base class.
 *
 * @method ArchivosAdjuntos getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchivosAdjuntosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_archivo'        => new sfWidgetFormInputHidden(),
      'folio'             => new sfWidgetFormInputText(),
      'id_proyecto'       => new sfWidgetFormInputText(),
      'id_usuario'        => new sfWidgetFormInputText(),
      'nombre_archivo'    => new sfWidgetFormInputText(),
      'extension'         => new sfWidgetFormInputText(),
      'ruta'              => new sfWidgetFormInputText(),
      'fecha'             => new sfWidgetFormDateTime(),
      'kilobytes'         => new sfWidgetFormInputText(),
      'id_tipo_documento' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_archivo'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_archivo')), 'empty_value' => $this->getObject()->get('id_archivo'), 'required' => false)),
      'folio'             => new sfValidatorInteger(),
      'id_proyecto'       => new sfValidatorInteger(),
      'id_usuario'        => new sfValidatorInteger(),
      'nombre_archivo'    => new sfValidatorString(array('max_length' => 255)),
      'extension'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'ruta'              => new sfValidatorString(array('max_length' => 255)),
      'fecha'             => new sfValidatorDateTime(),
      'kilobytes'         => new sfValidatorString(array('max_length' => 45)),
      'id_tipo_documento' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('archivos_adjuntos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivosAdjuntos';
  }

}
