<?php

/**
 * ProyectoRespaldo form base class.
 *
 * @method ProyectoRespaldo getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProyectoRespaldoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'           => new sfWidgetFormInputHidden(),
      'id_pais'               => new sfWidgetFormInputText(),
      'fecha_creacion'        => new sfWidgetFormDate(),
      'id_creador'            => new sfWidgetFormInputText(),
      'titulo'                => new sfWidgetFormInputText(),
      'titulo_ing'            => new sfWidgetFormInputText(),
      'id_responsable_proy'   => new sfWidgetFormInputText(),
      'numero_contrato'       => new sfWidgetFormInputText(),
      'numero_contable'       => new sfWidgetFormInputText(),
      'nombre_contrato'       => new sfWidgetFormInputText(),
      'id_responsable_cont'   => new sfWidgetFormInputText(),
      'fecha_firma_contrato'  => new sfWidgetFormDate(),
      'sigla_contable'        => new sfWidgetFormInputText(),
      'nombre_proyecto_resum' => new sfWidgetFormInputText(),
      'donante'               => new sfWidgetFormInputText(),
      'contraparte'           => new sfWidgetFormInputText(),
      'correo_contraparte'    => new sfWidgetFormInputText(),
      'duracion_proyecto'     => new sfWidgetFormInputText(),
      'fecha_inicio'          => new sfWidgetFormDate(),
      'fecha_termino'         => new sfWidgetFormDate(),
      'fecha_avance_inf'      => new sfWidgetFormDate(),
      'fecha_fin_inf'         => new sfWidgetFormDate(),
      'id_moneda'             => new sfWidgetFormInputText(),
      'overhead_autorizado'   => new sfWidgetFormInputText(),
      'monto_total'           => new sfWidgetFormInputText(),
      'monto_pago_remesa'     => new sfWidgetFormInputText(),
      'fecha_pago_remesa'     => new sfWidgetFormDate(),
      'descr_proyecto'        => new sfWidgetFormTextarea(),
      'descr_proyecto_ing'    => new sfWidgetFormTextarea(),
      'objetivo'              => new sfWidgetFormInputText(),
      'id_estado_proyecto'    => new sfWidgetFormInputText(),
      'id_padre'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_proyecto'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proyecto')), 'empty_value' => $this->getObject()->get('id_proyecto'), 'required' => false)),
      'id_pais'               => new sfValidatorInteger(),
      'fecha_creacion'        => new sfValidatorDate(array('required' => false)),
      'id_creador'            => new sfValidatorInteger(),
      'titulo'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'titulo_ing'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_responsable_proy'   => new sfValidatorInteger(array('required' => false)),
      'numero_contrato'       => new sfValidatorInteger(),
      'numero_contable'       => new sfValidatorInteger(),
      'nombre_contrato'       => new sfValidatorString(array('max_length' => 45)),
      'id_responsable_cont'   => new sfValidatorInteger(array('required' => false)),
      'fecha_firma_contrato'  => new sfValidatorDate(array('required' => false)),
      'sigla_contable'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre_proyecto_resum' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'donante'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'contraparte'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'correo_contraparte'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'duracion_proyecto'     => new sfValidatorInteger(array('required' => false)),
      'fecha_inicio'          => new sfValidatorDate(array('required' => false)),
      'fecha_termino'         => new sfValidatorDate(array('required' => false)),
      'fecha_avance_inf'      => new sfValidatorDate(array('required' => false)),
      'fecha_fin_inf'         => new sfValidatorDate(array('required' => false)),
      'id_moneda'             => new sfValidatorInteger(array('required' => false)),
      'overhead_autorizado'   => new sfValidatorInteger(array('required' => false)),
      'monto_total'           => new sfValidatorInteger(array('required' => false)),
      'monto_pago_remesa'     => new sfValidatorInteger(),
      'fecha_pago_remesa'     => new sfValidatorDate(array('required' => false)),
      'descr_proyecto'        => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'descr_proyecto_ing'    => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'objetivo'              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_estado_proyecto'    => new sfValidatorInteger(array('required' => false)),
      'id_padre'              => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('proyecto_respaldo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoRespaldo';
  }

}
