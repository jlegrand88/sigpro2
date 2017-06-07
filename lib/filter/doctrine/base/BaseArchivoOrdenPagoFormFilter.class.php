<?php

/**
 * ArchivoOrdenPago filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArchivoOrdenPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_orden_pago'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenPago'), 'add_empty' => true)),
      'nombre'                => new sfWidgetFormFilterInput(),
      'archivo'               => new sfWidgetFormFilterInput(),
      'ruta'                  => new sfWidgetFormFilterInput(),
      'fecha_upload'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id_orden_pago'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdenPago'), 'column' => 'id_orden_pago')),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'archivo'               => new sfValidatorPass(array('required' => false)),
      'ruta'                  => new sfValidatorPass(array('required' => false)),
      'fecha_upload'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('archivo_orden_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoOrdenPago';
  }

  public function getFields()
  {
    return array(
      'id_archivo_orden_pago' => 'Number',
      'id_orden_pago'         => 'ForeignKey',
      'nombre'                => 'Text',
      'archivo'               => 'Text',
      'ruta'                  => 'Text',
      'fecha_upload'          => 'Date',
    );
  }
}
