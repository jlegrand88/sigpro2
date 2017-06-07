<?php

/**
 * TipoMovimiento form base class.
 *
 * @method TipoMovimiento getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipoMovimientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_movimiento' => new sfWidgetFormInputHidden(),
      'descripcion'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_tipo_movimiento' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tipo_movimiento')), 'empty_value' => $this->getObject()->get('id_tipo_movimiento'), 'required' => false)),
      'descripcion'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_movimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoMovimiento';
  }

}
