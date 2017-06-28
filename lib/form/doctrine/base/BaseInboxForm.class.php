<?php

/**
 * Inbox form base class.
 *
 * @method Inbox getObject() Returns the current form's model object
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInboxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_inbox'          => new sfWidgetFormInputHidden(),
      'id_proyecto'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => false)),
      'id_emisor'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Emisor'), 'add_empty' => false)),
      'id_destinatario'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'), 'add_empty' => false)),
      'id_accion'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'), 'add_empty' => true)),
      'fecha_recepcion'   => new sfWidgetFormDate(),
      'fecha_despacho'    => new sfWidgetFormDate(),
      'unidad_origen'     => new sfWidgetFormInputText(),
      'unidad_destino'    => new sfWidgetFormInputText(),
      'id_tipo_documento' => new sfWidgetFormInputText(),
      'folio'             => new sfWidgetFormInputText(),
      'id_orden_pago'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_inbox'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_inbox')), 'empty_value' => $this->getObject()->get('id_inbox'), 'required' => false)),
      'id_proyecto'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'))),
      'id_emisor'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Emisor'))),
      'id_destinatario'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Destinatario'))),
      'id_accion'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'), 'required' => false)),
      'fecha_recepcion'   => new sfValidatorDate(array('required' => false)),
      'fecha_despacho'    => new sfValidatorDate(array('required' => false)),
      'unidad_origen'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'unidad_destino'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_tipo_documento' => new sfValidatorInteger(array('required' => false)),
      'folio'             => new sfValidatorInteger(array('required' => false)),
      'id_orden_pago'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inbox[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inbox';
  }

}
