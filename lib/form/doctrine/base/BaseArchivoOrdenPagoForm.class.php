<?php

/**
 * ArchivoOrdenPago form base class.
 *
 * @method ArchivoOrdenPago getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchivoOrdenPagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_archivo_orden_pago' => new sfWidgetFormInputHidden(),
      'id_orden_pago'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'add_empty' => true)),
      'nombre'                => new sfWidgetFormInputText(),
      'archivo'               => new sfWidgetFormInputText(),
      'ruta'                  => new sfWidgetFormInputText(),
      'fecha_upload'          => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id_archivo_orden_pago' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_archivo_orden_pago')), 'empty_value' => $this->getObject()->get('id_archivo_orden_pago'), 'required' => false)),
      'id_orden_pago'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'archivo'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'ruta'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_upload'          => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('archivo_orden_pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoOrdenPago';
  }

}
