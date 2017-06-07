<?php

/**
 * ProyectoRespaldo filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProyectoRespaldoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pais'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_creacion'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_creador'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titulo'                => new sfWidgetFormFilterInput(),
      'titulo_ing'            => new sfWidgetFormFilterInput(),
      'id_responsable_proy'   => new sfWidgetFormFilterInput(),
      'numero_contrato'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_contable'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_contrato'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_responsable_cont'   => new sfWidgetFormFilterInput(),
      'fecha_firma_contrato'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sigla_contable'        => new sfWidgetFormFilterInput(),
      'nombre_proyecto_resum' => new sfWidgetFormFilterInput(),
      'donante'               => new sfWidgetFormFilterInput(),
      'contraparte'           => new sfWidgetFormFilterInput(),
      'correo_contraparte'    => new sfWidgetFormFilterInput(),
      'duracion_proyecto'     => new sfWidgetFormFilterInput(),
      'fecha_inicio'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_termino'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_avance_inf'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_fin_inf'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_moneda'             => new sfWidgetFormFilterInput(),
      'overhead_autorizado'   => new sfWidgetFormFilterInput(),
      'monto_total'           => new sfWidgetFormFilterInput(),
      'monto_pago_remesa'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_pago_remesa'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'descr_proyecto'        => new sfWidgetFormFilterInput(),
      'descr_proyecto_ing'    => new sfWidgetFormFilterInput(),
      'objetivo'              => new sfWidgetFormFilterInput(),
      'id_estado_proyecto'    => new sfWidgetFormFilterInput(),
      'id_padre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pais'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_creacion'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_creador'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'titulo'                => new sfValidatorPass(array('required' => false)),
      'titulo_ing'            => new sfValidatorPass(array('required' => false)),
      'id_responsable_proy'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_contrato'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_contable'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_contrato'       => new sfValidatorPass(array('required' => false)),
      'id_responsable_cont'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_firma_contrato'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sigla_contable'        => new sfValidatorPass(array('required' => false)),
      'nombre_proyecto_resum' => new sfValidatorPass(array('required' => false)),
      'donante'               => new sfValidatorPass(array('required' => false)),
      'contraparte'           => new sfValidatorPass(array('required' => false)),
      'correo_contraparte'    => new sfValidatorPass(array('required' => false)),
      'duracion_proyecto'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_inicio'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_termino'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_avance_inf'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_fin_inf'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_moneda'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'overhead_autorizado'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'monto_total'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'monto_pago_remesa'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_pago_remesa'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'descr_proyecto'        => new sfValidatorPass(array('required' => false)),
      'descr_proyecto_ing'    => new sfValidatorPass(array('required' => false)),
      'objetivo'              => new sfValidatorPass(array('required' => false)),
      'id_estado_proyecto'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_padre'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('proyecto_respaldo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoRespaldo';
  }

  public function getFields()
  {
    return array(
      'id_proyecto'           => 'Number',
      'id_pais'               => 'Number',
      'fecha_creacion'        => 'Date',
      'id_creador'            => 'Number',
      'titulo'                => 'Text',
      'titulo_ing'            => 'Text',
      'id_responsable_proy'   => 'Number',
      'numero_contrato'       => 'Number',
      'numero_contable'       => 'Number',
      'nombre_contrato'       => 'Text',
      'id_responsable_cont'   => 'Number',
      'fecha_firma_contrato'  => 'Date',
      'sigla_contable'        => 'Text',
      'nombre_proyecto_resum' => 'Text',
      'donante'               => 'Text',
      'contraparte'           => 'Text',
      'correo_contraparte'    => 'Text',
      'duracion_proyecto'     => 'Number',
      'fecha_inicio'          => 'Date',
      'fecha_termino'         => 'Date',
      'fecha_avance_inf'      => 'Date',
      'fecha_fin_inf'         => 'Date',
      'id_moneda'             => 'Number',
      'overhead_autorizado'   => 'Number',
      'monto_total'           => 'Number',
      'monto_pago_remesa'     => 'Number',
      'fecha_pago_remesa'     => 'Date',
      'descr_proyecto'        => 'Text',
      'descr_proyecto_ing'    => 'Text',
      'objetivo'              => 'Text',
      'id_estado_proyecto'    => 'Number',
      'id_padre'              => 'Number',
    );
  }
}
