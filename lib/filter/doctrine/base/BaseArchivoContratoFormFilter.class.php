<?php

/**
 * ArchivoContrato filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArchivoContratoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'archivo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ruta'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_proyecto'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'archivo'             => new sfValidatorPass(array('required' => false)),
      'ruta'                => new sfValidatorPass(array('required' => false)),
      'fecha'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('archivo_contrato_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoContrato';
  }

  public function getFields()
  {
    return array(
      'id_archivo_contrato' => 'Number',
      'id_proyecto'         => 'ForeignKey',
      'nombre'              => 'Text',
      'archivo'             => 'Text',
      'ruta'                => 'Text',
      'fecha'               => 'Date',
    );
  }
}
