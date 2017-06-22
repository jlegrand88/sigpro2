<?php

/**
 * OrdenPago filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrdenPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'folio'               => new sfWidgetFormFilterInput(),
      'id_moneda'           => new sfWidgetFormFilterInput(),
      'id_proyecto'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'id_usuario'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'rut_proveedor'       => new sfWidgetFormFilterInput(),
      'fecha_ingreso'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_contabilizado' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'observacion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'folio'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_moneda'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_proyecto'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'id_usuario'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id_usuario')),
      'rut_proveedor'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_ingreso'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_contabilizado' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'observacion'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('orden_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrdenPago';
  }

  public function getFields()
  {
    return array(
      'id_orden_pago'       => 'Number',
      'folio'               => 'Number',
      'id_moneda'           => 'Number',
      'id_proyecto'         => 'ForeignKey',
      'id_usuario'          => 'ForeignKey',
      'rut_proveedor'       => 'Number',
      'fecha_ingreso'       => 'Date',
      'fecha_contabilizado' => 'Date',
      'observacion'         => 'Text',
    );
  }
}
