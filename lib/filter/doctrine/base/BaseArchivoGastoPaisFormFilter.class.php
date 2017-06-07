<?php

/**
 * ArchivoGastoPais filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArchivoGastoPaisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'nombre'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ruta'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'vigente'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_usuario'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id_usuario')),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'ruta'                  => new sfValidatorPass(array('required' => false)),
      'fecha'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'vigente'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('archivo_gasto_pais_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivoGastoPais';
  }

  public function getFields()
  {
    return array(
      'id_archivo_gasto_pais' => 'Number',
      'id_usuario'            => 'ForeignKey',
      'nombre'                => 'Text',
      'ruta'                  => 'Text',
      'fecha'                 => 'Date',
      'vigente'               => 'Number',
    );
  }
}
