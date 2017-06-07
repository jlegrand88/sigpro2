<?php

/**
 * Proyecto filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProyectoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pais'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'fecha_creacion'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_creador'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creador'), 'add_empty' => true)),
      'titulo'                       => new sfWidgetFormFilterInput(),
      'titulo_ing'                   => new sfWidgetFormFilterInput(),
      'id_responsable_proy'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableProyecto'), 'add_empty' => true)),
      'numero_contrato'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_contable'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_contrato'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_responsable_cont'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableCont'), 'add_empty' => true)),
      'fecha_firma_contrato'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sigla_contable'               => new sfWidgetFormFilterInput(),
      'nombre_proyecto_resum'        => new sfWidgetFormFilterInput(),
      'donante'                      => new sfWidgetFormFilterInput(),
      'contraparte'                  => new sfWidgetFormFilterInput(),
      'correo_contraparte'           => new sfWidgetFormFilterInput(),
      'duracion_proyecto'            => new sfWidgetFormFilterInput(),
      'fecha_inicio'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_termino'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_avance_inf'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_fin_inf'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_moneda'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Moneda'), 'add_empty' => true)),
      'overhead_autorizado'          => new sfWidgetFormFilterInput(),
      'monto_total'                  => new sfWidgetFormFilterInput(),
      'monto_pago_remesa'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_pago_remesa'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'descr_proyecto'               => new sfWidgetFormFilterInput(),
      'descr_proyecto_ing'           => new sfWidgetFormFilterInput(),
      'objetivo'                     => new sfWidgetFormFilterInput(),
      'id_estado_proyecto'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'add_empty' => true)),
      'folio'                        => new sfWidgetFormFilterInput(),
      'id_grupo_proyecto'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => true)),
      'id_pais_ejecuta'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisEjecuta'), 'add_empty' => true)),
      'recupera_costo'               => new sfWidgetFormFilterInput(),
      'frases_claves'                => new sfWidgetFormFilterInput(),
      'id_tipo_control_tec'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlTec'), 'add_empty' => true)),
      'id_tipo_control_fin'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlFin'), 'add_empty' => true)),
      'usuarios_proyecto_grupo_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Usuario')),
    ));

    $this->setValidators(array(
      'id_pais'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pais'), 'column' => 'id_pais')),
      'fecha_creacion'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_creador'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creador'), 'column' => 'id_usuario')),
      'titulo'                       => new sfValidatorPass(array('required' => false)),
      'titulo_ing'                   => new sfValidatorPass(array('required' => false)),
      'id_responsable_proy'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ResponsableProyecto'), 'column' => 'id_usuario')),
      'numero_contrato'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_contable'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_contrato'              => new sfValidatorPass(array('required' => false)),
      'id_responsable_cont'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ResponsableCont'), 'column' => 'id_usuario')),
      'fecha_firma_contrato'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sigla_contable'               => new sfValidatorPass(array('required' => false)),
      'nombre_proyecto_resum'        => new sfValidatorPass(array('required' => false)),
      'donante'                      => new sfValidatorPass(array('required' => false)),
      'contraparte'                  => new sfValidatorPass(array('required' => false)),
      'correo_contraparte'           => new sfValidatorPass(array('required' => false)),
      'duracion_proyecto'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_inicio'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_termino'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_avance_inf'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_fin_inf'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_moneda'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Moneda'), 'column' => 'id_moneda')),
      'overhead_autorizado'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_total'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_pago_remesa'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_pago_remesa'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'descr_proyecto'               => new sfValidatorPass(array('required' => false)),
      'descr_proyecto_ing'           => new sfValidatorPass(array('required' => false)),
      'objetivo'                     => new sfValidatorPass(array('required' => false)),
      'id_estado_proyecto'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoProyecto'), 'column' => 'id_estado_proyecto')),
      'folio'                        => new sfValidatorPass(array('required' => false)),
      'id_grupo_proyecto'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GrupoProyecto'), 'column' => 'id_grupo_proyecto')),
      'id_pais_ejecuta'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaisEjecuta'), 'column' => 'id_pais')),
      'recupera_costo'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'frases_claves'                => new sfValidatorPass(array('required' => false)),
      'id_tipo_control_tec'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoControlTec'), 'column' => 'id_tipo_control')),
      'id_tipo_control_fin'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoControlFin'), 'column' => 'id_tipo_control')),
      'usuarios_proyecto_grupo_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addUsuariosProyectoGrupoListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProyectoGrupo ProyectoGrupo')
      ->andWhereIn('ProyectoGrupo.id_usuario', $values)
    ;
  }

  public function getModelName()
  {
    return 'Proyecto';
  }

  public function getFields()
  {
    return array(
      'id_proyecto'                  => 'Number',
      'id_pais'                      => 'ForeignKey',
      'fecha_creacion'               => 'Date',
      'id_creador'                   => 'ForeignKey',
      'titulo'                       => 'Text',
      'titulo_ing'                   => 'Text',
      'id_responsable_proy'          => 'ForeignKey',
      'numero_contrato'              => 'Number',
      'numero_contable'              => 'Number',
      'nombre_contrato'              => 'Text',
      'id_responsable_cont'          => 'ForeignKey',
      'fecha_firma_contrato'         => 'Date',
      'sigla_contable'               => 'Text',
      'nombre_proyecto_resum'        => 'Text',
      'donante'                      => 'Text',
      'contraparte'                  => 'Text',
      'correo_contraparte'           => 'Text',
      'duracion_proyecto'            => 'Number',
      'fecha_inicio'                 => 'Date',
      'fecha_termino'                => 'Date',
      'fecha_avance_inf'             => 'Date',
      'fecha_fin_inf'                => 'Date',
      'id_moneda'                    => 'ForeignKey',
      'overhead_autorizado'          => 'Number',
      'monto_total'                  => 'Number',
      'monto_pago_remesa'            => 'Number',
      'fecha_pago_remesa'            => 'Date',
      'descr_proyecto'               => 'Text',
      'descr_proyecto_ing'           => 'Text',
      'objetivo'                     => 'Text',
      'id_estado_proyecto'           => 'ForeignKey',
      'folio'                        => 'Text',
      'id_grupo_proyecto'            => 'ForeignKey',
      'id_pais_ejecuta'              => 'ForeignKey',
      'recupera_costo'               => 'Number',
      'frases_claves'                => 'Text',
      'id_tipo_control_tec'          => 'ForeignKey',
      'id_tipo_control_fin'          => 'ForeignKey',
      'usuarios_proyecto_grupo_list' => 'ManyKey',
    );
  }
}
