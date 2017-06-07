<?php

/**
 * Usuario filter form base class.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_grupo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
      'rut'               => new sfWidgetFormFilterInput(),
      'nombre'            => new sfWidgetFormFilterInput(),
      'apellido_paterno'  => new sfWidgetFormFilterInput(),
      'apellido_materno'  => new sfWidgetFormFilterInput(),
      'correo'            => new sfWidgetFormFilterInput(),
      'password'          => new sfWidgetFormFilterInput(),
      'id_pais'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'id_grupo_proyecto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => true)),
      'id_perfil'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Perfil'), 'add_empty' => true)),
      'is_active'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_grupo'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Grupo'), 'column' => 'id_grupo')),
      'rut'               => new sfValidatorPass(array('required' => false)),
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'apellido_paterno'  => new sfValidatorPass(array('required' => false)),
      'apellido_materno'  => new sfValidatorPass(array('required' => false)),
      'correo'            => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'id_pais'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pais'), 'column' => 'id_pais')),
      'id_grupo_proyecto' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GrupoProyecto'), 'column' => 'id_grupo_proyecto')),
      'id_perfil'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Perfil'), 'column' => 'id_perfil')),
      'is_active'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id_usuario'        => 'Number',
      'id_grupo'          => 'ForeignKey',
      'rut'               => 'Text',
      'nombre'            => 'Text',
      'apellido_paterno'  => 'Text',
      'apellido_materno'  => 'Text',
      'correo'            => 'Text',
      'password'          => 'Text',
      'id_pais'           => 'ForeignKey',
      'id_grupo_proyecto' => 'ForeignKey',
      'id_perfil'         => 'ForeignKey',
      'is_active'         => 'Number',
    );
  }
}
