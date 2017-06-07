<?php

/**
 * Folio form base class.
 *
 * @method Folio getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFolioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idfolio'           => new sfWidgetFormInputHidden(),
      'numero_actual'     => new sfWidgetFormInputText(),
      'anho_actual'       => new sfWidgetFormInputText(),
      'id_tipo_documento' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idfolio'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idfolio')), 'empty_value' => $this->getObject()->get('idfolio'), 'required' => false)),
      'numero_actual'     => new sfValidatorInteger(),
      'anho_actual'       => new sfValidatorInteger(),
      'id_tipo_documento' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('folio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Folio';
  }

}
