<?php

/**
 * Bitacora form base class.
 *
 * @method Bitacora getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBitacoraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_bitacora'    => new sfWidgetFormInputHidden(),
      'id_proyecto'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => false)),
      'id_usuario'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'id_accion'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'), 'add_empty' => false)),
      'fecha_creacion' => new sfWidgetFormDate(),
      'observacion'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_bitacora'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_bitacora')), 'empty_value' => $this->getObject()->get('id_bitacora'), 'required' => false)),
      'id_proyecto'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'))),
      'id_usuario'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'id_accion'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'))),
      'fecha_creacion' => new sfValidatorDate(array('required' => false)),
      'observacion'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitacora[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bitacora';
  }

}
