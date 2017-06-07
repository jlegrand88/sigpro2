<?php

/**
 * DetalleOrdenPago form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DetalleOrdenPagoForm extends BaseDetalleOrdenPagoForm
{
    public function configure()
    {
        $this->setWidgets(array(
//            'id_detalle_orden_pago' => new sfWidgetFormInputHidden(),
            'cuenta'              => new sfWidgetFormInputHidden(),
            'nombre_cuenta'       => new sfWidgetFormInputHidden(),
            'presupuesto'         => new sfWidgetFormInputHidden(),
            'ejecucion'           => new sfWidgetFormInputHidden(),
            'compromiso'          => new sfWidgetFormInputHidden(),
            'saldo_efectivo'       => new sfWidgetFormInputHidden(),
            'monto_pago'     => new sfWidgetFormInputText(array(),array('class' => 'form-control input-sm')),
        ));

        $this->setValidators(array(
//            'id_detalle_orden_pago' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_orden_pago')), 'empty_value' => $this->getObject()->get('id_orden_pago'), 'required' => false)),
            'cuenta'              => new sfValidatorString(array('max_length' => 11, 'required' => false)),
            'nombre_cuenta'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
            'presupuesto'         => new sfValidatorNumber(array('required' => false)),
            'ejecucion'           => new sfValidatorNumber(array('required' => false)),
            'compromiso'          => new sfValidatorNumber(array('required' => false)),
            'saldo_efectivo'       => new sfValidatorNumber(array('required' => false)),
            'monto_pago'     => new sfValidatorNumber(array('required' => false)),
        ));
        if(!$this->getObject()->isNew())
        {
            $this->setWidget('id_detalle_orden_pago',new sfWidgetFormInputHidden());
            $this->setValidator('id_detalle_orden_pago',new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_orden_pago')), 'empty_value' => $this->getObject()->get('id_orden_pago'), 'required' => false)));
        }
    }
}
