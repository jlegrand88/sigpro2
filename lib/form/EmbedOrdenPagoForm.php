<?php

/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 29/05/2017
 * Time: 11:56
 */
class EmbedOrdenPagoForm extends OrdenPagoForm
{
    public function configure()
    {
        parent::configure();
        $this->setWidgets(array(
            'id_orden_pago'       => new sfWidgetFormInputHidden(),
            'folio'               => new sfWidgetFormInputHidden(),
            'cuenta'              => new sfWidgetFormInputHidden(),
            'nombre_cuenta'       => new sfWidgetFormInputHidden(),
            'id_moneda'            => new sfWidgetFormInputHidden(),
            'presupuesto'         => new sfWidgetFormInputHidden(),
            'ejecucion'           => new sfWidgetFormInputHidden(),
            'compromiso'          => new sfWidgetFormInputHidden(),
            'saldo_efectivo'       => new sfWidgetFormInputHidden(),
            'monto_documento'     => new sfWidgetFormInputText(),
            'id_proyecto'         => new sfWidgetFormInputHidden(),
            'id_usuario'          => new sfWidgetFormInputHidden(),
            'rut_proveedor'       => new sfWidgetFormInputHidden(),
            'numero_documento'    => new sfWidgetFormInputHidden(),
            'fecha_ingreso'       => new sfWidgetFormInputHidden(),
            'fecha_documento'     => new sfWidgetFormInputHidden(),
            'fecha_contabilizado' => new sfWidgetFormInputHidden(),
        ));

        $this->setValidators(array(
            'id_orden_pago'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_orden_pago')), 'empty_value' => $this->getObject()->get('id_orden_pago'), 'required' => false)),
            'folio'               => new sfValidatorInteger(array('required' => false)),
            'cuenta'              => new sfValidatorString(array('max_length' => 11, 'required' => false)),
            'nombre_cuenta'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
            'id_moneda'            => new sfValidatorInteger(array('required' => false)),
            'presupuesto'         => new sfValidatorNumber(array('required' => false)),
            'ejecucion'           => new sfValidatorNumber(array('required' => false)),
            'compromiso'          => new sfValidatorNumber(array('required' => false)),
            'saldo_efectivo'       => new sfValidatorNumber(array('required' => false)),
            'monto_documento'     => new sfValidatorNumber(array('required' => false)),
            'id_proyecto'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'required' => false)),
            'id_usuario'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'required' => false)),
            'rut_proveedor'       => new sfValidatorInteger(array('required' => false)),
            'numero_documento'    => new sfValidatorInteger(array('required' => false)),
            'fecha_ingreso'       => new sfValidatorDateTime(array('required' => false)),
            'fecha_documento'     => new sfValidatorDateTime(array('required' => false)),
            'fecha_contabilizado' => new sfValidatorDateTime(array('required' => false)),
        ));
    }
}