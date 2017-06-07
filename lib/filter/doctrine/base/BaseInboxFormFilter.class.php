<?php

/**
 * Inbox filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInboxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'id_emisor'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Emisor'), 'add_empty' => true)),
      'id_destinatario'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'), 'add_empty' => true)),
      'id_accion'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'), 'add_empty' => true)),
      'fecha_recepcion'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_despacho'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'unidad_origen'     => new sfWidgetFormFilterInput(),
      'unidad_destino'    => new sfWidgetFormFilterInput(),
      'id_tipo_documento' => new sfWidgetFormFilterInput(),
      'folio'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_proyecto'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'id_emisor'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Emisor'), 'column' => 'id_usuario')),
      'id_destinatario'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Destinatario'), 'column' => 'id_usuario')),
      'id_accion'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Accion'), 'column' => 'id_accion')),
      'fecha_recepcion'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_despacho'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'unidad_origen'     => new sfValidatorPass(array('required' => false)),
      'unidad_destino'    => new sfValidatorPass(array('required' => false)),
      'id_tipo_documento' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('inbox_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inbox';
  }

  public function getFields()
  {
    return array(
      'id_inbox'          => 'Number',
      'id_proyecto'       => 'ForeignKey',
      'id_emisor'         => 'ForeignKey',
      'id_destinatario'   => 'ForeignKey',
      'id_accion'         => 'ForeignKey',
      'fecha_recepcion'   => 'Date',
      'fecha_despacho'    => 'Date',
      'unidad_origen'     => 'Text',
      'unidad_destino'    => 'Text',
      'id_tipo_documento' => 'Number',
      'folio'             => 'Number',
    );
  }
}
