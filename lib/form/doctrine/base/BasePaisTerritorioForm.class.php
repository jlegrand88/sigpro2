<?php

/**
 * PaisTerritorio form base class.
 *
 * @method PaisTerritorio getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaisTerritorioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pais_territorio' => new sfWidgetFormInputHidden(),
      'id_pais'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => false)),
      'id_territorio'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Territorio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pais_territorio' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pais_territorio')), 'empty_value' => $this->getObject()->get('id_pais_territorio'), 'required' => false)),
      'id_pais'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'))),
      'id_territorio'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Territorio'))),
    ));

    $this->widgetSchema->setNameFormat('pais_territorio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaisTerritorio';
  }

}
