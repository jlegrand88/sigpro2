<?php

/**
 * Proveedor form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorForm extends BaseProveedorForm
{
  public function configure()
  {
      $this->setWidgets(array(
          'id_proveedor'  => new sfWidgetFormInputHidden(),
          'rut_proveedor' => new sfWidgetFormInputText(),
          'razon_social'  => new sfWidgetFormInputText(),
          'telefono'      => new sfWidgetFormInputText(),
          'email'         => new sfWidgetFormInputText(),
      ));

      $this->setValidators(array(
          'id_proveedor'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proveedor')), 'empty_value' => $this->getObject()->get('id_proveedor'), 'required' => false)),
          'rut_proveedor' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
          'razon_social'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
          'telefono'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
          'email'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      ));
      $this->widgetSchema->setNameFormat('proveedor[%s]');
  }
}
