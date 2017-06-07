<?php

/**
 * Bitacora filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBitacoraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => true)),
      'id_usuario'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'id_accion'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'), 'add_empty' => true)),
      'fecha_creacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'observacion'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_proyecto'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyecto'), 'column' => 'id_proyecto')),
      'id_usuario'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id_usuario')),
      'id_accion'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Accion'), 'column' => 'id_accion')),
      'fecha_creacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'observacion'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bitacora';
  }

  public function getFields()
  {
    return array(
      'id_bitacora'    => 'Number',
      'id_proyecto'    => 'ForeignKey',
      'id_usuario'     => 'ForeignKey',
      'id_accion'      => 'ForeignKey',
      'fecha_creacion' => 'Date',
      'observacion'    => 'Text',
    );
  }
}
