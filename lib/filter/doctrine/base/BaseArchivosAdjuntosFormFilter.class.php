<?php

/**
 * ArchivosAdjuntos filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArchivosAdjuntosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'folio'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_proyecto'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_usuario'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_archivo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'extension'         => new sfWidgetFormFilterInput(),
      'ruta'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'kilobytes'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_documento' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'folio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_proyecto'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_usuario'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_archivo'    => new sfValidatorPass(array('required' => false)),
      'extension'         => new sfValidatorPass(array('required' => false)),
      'ruta'              => new sfValidatorPass(array('required' => false)),
      'fecha'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'kilobytes'         => new sfValidatorPass(array('required' => false)),
      'id_tipo_documento' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('archivos_adjuntos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArchivosAdjuntos';
  }

  public function getFields()
  {
    return array(
      'id_archivo'        => 'Number',
      'folio'             => 'Number',
      'id_proyecto'       => 'Number',
      'id_usuario'        => 'Number',
      'nombre_archivo'    => 'Text',
      'extension'         => 'Text',
      'ruta'              => 'Text',
      'fecha'             => 'Date',
      'kilobytes'         => 'Text',
      'id_tipo_documento' => 'Number',
    );
  }
}
