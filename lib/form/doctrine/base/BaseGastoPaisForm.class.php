<?php

/**
 * GastoPais form base class.
 *
 * @method GastoPais getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGastoPaisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_gasto_pais'         => new sfWidgetFormInputHidden(),
      'id_proyecto'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => false)),
      'id_tipo_movimiento'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMovimiento'), 'add_empty' => false)),
      'id_archivo_gasto_pais' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArchivoGastoPais'), 'add_empty' => false)),
      'cuenta'                => new sfWidgetFormInputText(),
      'nombre_cuenta'         => new sfWidgetFormInputText(),
      'periodo'               => new sfWidgetFormInputText(),
      'enero'                 => new sfWidgetFormInputText(),
      'febrero'               => new sfWidgetFormInputText(),
      'marzo'                 => new sfWidgetFormInputText(),
      'abril'                 => new sfWidgetFormInputText(),
      'mayo'                  => new sfWidgetFormInputText(),
      'junio'                 => new sfWidgetFormInputText(),
      'julio'                 => new sfWidgetFormInputText(),
      'agosto'                => new sfWidgetFormInputText(),
      'septiembre'            => new sfWidgetFormInputText(),
      'octubre'               => new sfWidgetFormInputText(),
      'noviembre'             => new sfWidgetFormInputText(),
      'diciembre'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_gasto_pais'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_gasto_pais')), 'empty_value' => $this->getObject()->get('id_gasto_pais'), 'required' => false)),
      'id_proyecto'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'))),
      'id_tipo_movimiento'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMovimiento'))),
      'id_archivo_gasto_pais' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArchivoGastoPais'))),
      'cuenta'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre_cuenta'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'periodo'               => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'enero'                 => new sfValidatorInteger(array('required' => false)),
      'febrero'               => new sfValidatorInteger(array('required' => false)),
      'marzo'                 => new sfValidatorInteger(array('required' => false)),
      'abril'                 => new sfValidatorInteger(array('required' => false)),
      'mayo'                  => new sfValidatorInteger(array('required' => false)),
      'junio'                 => new sfValidatorInteger(array('required' => false)),
      'julio'                 => new sfValidatorInteger(array('required' => false)),
      'agosto'                => new sfValidatorInteger(array('required' => false)),
      'septiembre'            => new sfValidatorInteger(array('required' => false)),
      'octubre'               => new sfValidatorInteger(array('required' => false)),
      'noviembre'             => new sfValidatorInteger(array('required' => false)),
      'diciembre'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gasto_pais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GastoPais';
  }

}
