<?php

/**
 * RptGeneralProyecto filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRptGeneralProyectoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sigla_contable'   => new sfWidgetFormFilterInput(),
      'monto_total'      => new sfWidgetFormFilterInput(),
      'monto_ing'        => new sfWidgetFormFilterInput(),
      'monto_egre'       => new sfWidgetFormFilterInput(),
      'ing_reales'       => new sfWidgetFormFilterInput(),
      'gas_reales'       => new sfWidgetFormFilterInput(),
      'compromisos'      => new sfWidgetFormFilterInput(),
      'ing_reales_us'    => new sfWidgetFormFilterInput(),
      'gas_reales_us'    => new sfWidgetFormFilterInput(),
      'compromisos_us'   => new sfWidgetFormFilterInput(),
      'numcontable'      => new sfWidgetFormFilterInput(),
      'id_moneda'        => new sfWidgetFormFilterInput(),
      'porc_overhead'    => new sfWidgetFormFilterInput(),
      'grupo_proyecto'   => new sfWidgetFormFilterInput(),
      'fec_inicio_proy'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fec_termino_proy' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'moneda'           => new sfWidgetFormFilterInput(),
      'pais'             => new sfWidgetFormFilterInput(),
      'ppto_ovh'         => new sfWidgetFormFilterInput(),
      'gasto_ovhpesos'   => new sfWidgetFormFilterInput(),
      'gasto_ovhus'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sigla_contable'   => new sfValidatorPass(array('required' => false)),
      'monto_total'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'monto_ing'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'monto_egre'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ing_reales'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'gas_reales'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'compromisos'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ing_reales_us'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'gas_reales_us'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'compromisos_us'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'numcontable'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_moneda'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'porc_overhead'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'grupo_proyecto'   => new sfValidatorPass(array('required' => false)),
      'fec_inicio_proy'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fec_termino_proy' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'moneda'           => new sfValidatorPass(array('required' => false)),
      'pais'             => new sfValidatorPass(array('required' => false)),
      'ppto_ovh'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'gasto_ovhpesos'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'gasto_ovhus'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rpt_general_proyecto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RptGeneralProyecto';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'id_proyecto'      => 'Number',
      'sigla_contable'   => 'Text',
      'monto_total'      => 'Number',
      'monto_ing'        => 'Number',
      'monto_egre'       => 'Number',
      'ing_reales'       => 'Number',
      'gas_reales'       => 'Number',
      'compromisos'      => 'Number',
      'ing_reales_us'    => 'Number',
      'gas_reales_us'    => 'Number',
      'compromisos_us'   => 'Number',
      'numcontable'      => 'Number',
      'id_moneda'        => 'Number',
      'porc_overhead'    => 'Number',
      'grupo_proyecto'   => 'Text',
      'fec_inicio_proy'  => 'Date',
      'fec_termino_proy' => 'Date',
      'moneda'           => 'Text',
      'pais'             => 'Text',
      'ppto_ovh'         => 'Number',
      'gasto_ovhpesos'   => 'Number',
      'gasto_ovhus'      => 'Number',
    );
  }
}
