<?php

/**
 * InformeProyecto form base class.
 *
 * @method InformeProyecto getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInformeProyectoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_informe_proyecto' => new sfWidgetFormInputHidden(),
      'id_proyecto'         => new sfWidgetFormInputHidden(),
      'fecha_avance_inf'    => new sfWidgetFormDate(),
      'numero'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_informe_proyecto' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_informe_proyecto')), 'empty_value' => $this->getObject()->get('id_informe_proyecto'), 'required' => false)),
      'id_proyecto'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proyecto')), 'empty_value' => $this->getObject()->get('id_proyecto'), 'required' => false)),
      'fecha_avance_inf'    => new sfValidatorDate(array('required' => false)),
      'numero'              => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('informe_proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InformeProyecto';
  }

}
