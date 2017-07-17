<?php

/**
 * Proyecto form base class.
 *
 * @method Proyecto getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProyectoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto'                  => new sfWidgetFormInputHidden(),
      'id_pais'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => false)),
      'fecha_creacion'               => new sfWidgetFormDate(),
      'id_creador'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creador'), 'add_empty' => false)),
      'titulo'                       => new sfWidgetFormInputText(),
      'titulo_ing'                   => new sfWidgetFormInputText(),
      'id_responsable_proy'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableProyecto'), 'add_empty' => true)),
      'numero_contrato'              => new sfWidgetFormInputText(),
      'numero_contable'              => new sfWidgetFormInputText(),
      'nombre_contrato'              => new sfWidgetFormInputText(),
      'id_responsable_cont'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableCont'), 'add_empty' => true)),
      'fecha_firma_contrato'         => new sfWidgetFormDate(),
      'sigla_contable'               => new sfWidgetFormInputText(),
      'nombre_proyecto_resum'        => new sfWidgetFormInputText(),
      'donante'                      => new sfWidgetFormInputText(),
      'contraparte'                  => new sfWidgetFormInputText(),
      'correo_contraparte'           => new sfWidgetFormInputText(),
      'duracion_proyecto'            => new sfWidgetFormInputText(),
      'fecha_inicio'                 => new sfWidgetFormDate(),
      'fecha_termino'                => new sfWidgetFormDate(),
      'fecha_avance_inf'             => new sfWidgetFormDate(),
      'fecha_fin_inf'                => new sfWidgetFormDate(),
      'id_moneda'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Moneda'), 'add_empty' => true)),
      'overhead_autorizado'          => new sfWidgetFormInputText(),
      'monto_total'                  => new sfWidgetFormInputText(),
      'monto_pago_remesa'            => new sfWidgetFormInputText(),
      'fecha_pago_remesa'            => new sfWidgetFormDate(),
      'descr_proyecto'               => new sfWidgetFormTextarea(),
      'descr_proyecto_ing'           => new sfWidgetFormTextarea(),
      'objetivo'                     => new sfWidgetFormTextarea(),
      'id_estado_proyecto'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'add_empty' => true)),
      'folio'                        => new sfWidgetFormInputText(),
      'id_grupo_proyecto'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => true)),
      'id_pais_ejecuta'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisEjecuta'), 'add_empty' => true)),
      'recupera_costo'               => new sfWidgetFormInputText(),
      'frases_claves'                => new sfWidgetFormInputText(),
      'id_tipo_control_tec'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlTec'), 'add_empty' => true)),
      'id_tipo_control_fin'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlFin'), 'add_empty' => true)),
      'vigente'                      => new sfWidgetFormInputText(),
      'usuarios_proyecto_grupo_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Usuario')),
    ));

    $this->setValidators(array(
      'id_proyecto'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proyecto')), 'empty_value' => $this->getObject()->get('id_proyecto'), 'required' => false)),
      'id_pais'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'))),
      'fecha_creacion'               => new sfValidatorDate(array('required' => false)),
      'id_creador'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creador'))),
      'titulo'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'titulo_ing'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_responsable_proy'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableProyecto'), 'required' => false)),
      'numero_contrato'              => new sfValidatorInteger(),
      'numero_contable'              => new sfValidatorInteger(),
      'nombre_contrato'              => new sfValidatorString(array('max_length' => 45)),
      'id_responsable_cont'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableCont'), 'required' => false)),
      'fecha_firma_contrato'         => new sfValidatorDate(array('required' => false)),
      'sigla_contable'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre_proyecto_resum'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'donante'                      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'contraparte'                  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'correo_contraparte'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'duracion_proyecto'            => new sfValidatorInteger(array('required' => false)),
      'fecha_inicio'                 => new sfValidatorDate(array('required' => false)),
      'fecha_termino'                => new sfValidatorDate(array('required' => false)),
      'fecha_avance_inf'             => new sfValidatorDate(array('required' => false)),
      'fecha_fin_inf'                => new sfValidatorDate(array('required' => false)),
      'id_moneda'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Moneda'), 'required' => false)),
      'overhead_autorizado'          => new sfValidatorNumber(array('required' => false)),
      'monto_total'                  => new sfValidatorNumber(array('required' => false)),
      'monto_pago_remesa'            => new sfValidatorInteger(),
      'fecha_pago_remesa'            => new sfValidatorDate(array('required' => false)),
      'descr_proyecto'               => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'descr_proyecto_ing'           => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'objetivo'                     => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'id_estado_proyecto'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'required' => false)),
      'folio'                        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_grupo_proyecto'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'required' => false)),
      'id_pais_ejecuta'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaisEjecuta'), 'required' => false)),
      'recupera_costo'               => new sfValidatorNumber(array('required' => false)),
      'frases_claves'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_tipo_control_tec'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlTec'), 'required' => false)),
      'id_tipo_control_fin'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlFin'), 'required' => false)),
      'vigente'                      => new sfValidatorInteger(array('required' => false)),
      'usuarios_proyecto_grupo_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Usuario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proyecto';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['usuarios_proyecto_grupo_list']))
    {
      $this->setDefault('usuarios_proyecto_grupo_list', $this->object->UsuariosProyectoGrupo->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveUsuariosProyectoGrupoList($con);

    parent::doSave($con);
  }

  public function saveUsuariosProyectoGrupoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['usuarios_proyecto_grupo_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->UsuariosProyectoGrupo->getPrimaryKeys();
    $values = $this->getValue('usuarios_proyecto_grupo_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('UsuariosProyectoGrupo', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('UsuariosProyectoGrupo', array_values($link));
    }
  }

}
