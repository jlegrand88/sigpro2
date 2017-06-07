<?php

/**
 * RptGeneralProyecto form base class.
 *
 * @method RptGeneralProyecto getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRptGeneralProyectoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'id_proyecto'      => new sfWidgetFormInputHidden(),
      'sigla_contable'   => new sfWidgetFormInputText(),
      'monto_total'      => new sfWidgetFormInputText(),
      'monto_ing'        => new sfWidgetFormInputText(),
      'monto_egre'       => new sfWidgetFormInputText(),
      'ing_reales'       => new sfWidgetFormInputText(),
      'gas_reales'       => new sfWidgetFormInputText(),
      'compromisos'      => new sfWidgetFormInputText(),
      'ing_reales_us'    => new sfWidgetFormInputText(),
      'gas_reales_us'    => new sfWidgetFormInputText(),
      'compromisos_us'   => new sfWidgetFormInputText(),
      'numcontable'      => new sfWidgetFormInputText(),
      'id_moneda'        => new sfWidgetFormInputText(),
      'porc_overhead'    => new sfWidgetFormInputText(),
      'grupo_proyecto'   => new sfWidgetFormInputText(),
      'fec_inicio_proy'  => new sfWidgetFormDate(),
      'fec_termino_proy' => new sfWidgetFormDate(),
      'moneda'           => new sfWidgetFormInputText(),
      'pais'             => new sfWidgetFormInputText(),
      'ppto_ovh'         => new sfWidgetFormInputText(),
      'gasto_ovhpesos'   => new sfWidgetFormInputText(),
      'gasto_ovhus'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_proyecto'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proyecto')), 'empty_value' => $this->getObject()->get('id_proyecto'), 'required' => false)),
      'sigla_contable'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'monto_total'      => new sfValidatorInteger(array('required' => false)),
      'monto_ing'        => new sfValidatorInteger(array('required' => false)),
      'monto_egre'       => new sfValidatorInteger(array('required' => false)),
      'ing_reales'       => new sfValidatorInteger(array('required' => false)),
      'gas_reales'       => new sfValidatorInteger(array('required' => false)),
      'compromisos'      => new sfValidatorInteger(array('required' => false)),
      'ing_reales_us'    => new sfValidatorInteger(array('required' => false)),
      'gas_reales_us'    => new sfValidatorInteger(array('required' => false)),
      'compromisos_us'   => new sfValidatorInteger(array('required' => false)),
      'numcontable'      => new sfValidatorInteger(array('required' => false)),
      'id_moneda'        => new sfValidatorInteger(array('required' => false)),
      'porc_overhead'    => new sfValidatorNumber(array('required' => false)),
      'grupo_proyecto'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fec_inicio_proy'  => new sfValidatorDate(array('required' => false)),
      'fec_termino_proy' => new sfValidatorDate(array('required' => false)),
      'moneda'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'pais'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ppto_ovh'         => new sfValidatorNumber(array('required' => false)),
      'gasto_ovhpesos'   => new sfValidatorNumber(array('required' => false)),
      'gasto_ovhus'      => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpt_general_proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RptGeneralProyecto';
  }

}
