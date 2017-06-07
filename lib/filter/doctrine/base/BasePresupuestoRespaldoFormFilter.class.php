<?php

/**
 * PresupuestoRespaldo filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePresupuestoRespaldoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProyectoRespaldo'), 'add_empty' => true)),
      'id_tipo_movimiento' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMovimiento'), 'add_empty' => true)),
      'cuenta'             => new sfWidgetFormFilterInput(),
      'nombre_cuenta'      => new sfWidgetFormFilterInput(),
      'periodo'            => new sfWidgetFormFilterInput(),
      'enero'              => new sfWidgetFormFilterInput(),
      'febrero'            => new sfWidgetFormFilterInput(),
      'marzo'              => new sfWidgetFormFilterInput(),
      'abril'              => new sfWidgetFormFilterInput(),
      'mayo'               => new sfWidgetFormFilterInput(),
      'junio'              => new sfWidgetFormFilterInput(),
      'julio'              => new sfWidgetFormFilterInput(),
      'agosto'             => new sfWidgetFormFilterInput(),
      'septiembre'         => new sfWidgetFormFilterInput(),
      'octubre'            => new sfWidgetFormFilterInput(),
      'noviembre'          => new sfWidgetFormFilterInput(),
      'diciembre'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_proyecto'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProyectoRespaldo'), 'column' => 'id_proyecto')),
      'id_tipo_movimiento' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoMovimiento'), 'column' => 'id_tipo_movimiento')),
      'cuenta'             => new sfValidatorPass(array('required' => false)),
      'nombre_cuenta'      => new sfValidatorPass(array('required' => false)),
      'periodo'            => new sfValidatorPass(array('required' => false)),
      'enero'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'febrero'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'marzo'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'abril'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mayo'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'junio'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'julio'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'agosto'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'septiembre'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'octubre'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'noviembre'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'diciembre'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('presupuesto_respaldo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PresupuestoRespaldo';
  }

  public function getFields()
  {
    return array(
      'id_presupuesto'     => 'Number',
      'id_proyecto'        => 'ForeignKey',
      'id_tipo_movimiento' => 'ForeignKey',
      'cuenta'             => 'Text',
      'nombre_cuenta'      => 'Text',
      'periodo'            => 'Text',
      'enero'              => 'Number',
      'febrero'            => 'Number',
      'marzo'              => 'Number',
      'abril'              => 'Number',
      'mayo'               => 'Number',
      'junio'              => 'Number',
      'julio'              => 'Number',
      'agosto'             => 'Number',
      'septiembre'         => 'Number',
      'octubre'            => 'Number',
      'noviembre'          => 'Number',
      'diciembre'          => 'Number',
    );
  }
}
