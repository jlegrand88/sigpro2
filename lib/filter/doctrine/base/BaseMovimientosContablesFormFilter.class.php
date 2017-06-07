<?php

/**
 * MovimientosContables filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMovimientosContablesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_cuenta'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_cuenta'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'proyecto'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_comprobante' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'mes'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anho'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'glosa'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dolares'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pesos'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_cuenta'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo_cuenta'      => new sfValidatorPass(array('required' => false)),
      'nombre_cuenta'      => new sfValidatorPass(array('required' => false)),
      'proyecto'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_comprobante' => new sfValidatorPass(array('required' => false)),
      'fecha'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'mes'                => new sfValidatorPass(array('required' => false)),
      'anho'               => new sfValidatorPass(array('required' => false)),
      'glosa'              => new sfValidatorPass(array('required' => false)),
      'dolares'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pesos'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_tipo_cuenta'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('movimientos_contables_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MovimientosContables';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'codigo_cuenta'      => 'Text',
      'nombre_cuenta'      => 'Text',
      'proyecto'           => 'Number',
      'numero_comprobante' => 'Text',
      'fecha'              => 'Date',
      'mes'                => 'Text',
      'anho'               => 'Text',
      'glosa'              => 'Text',
      'dolares'            => 'Number',
      'pesos'              => 'Number',
      'id_tipo_cuenta'     => 'Number',
    );
  }
}
