<?php

/**
 * OrdenPago form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdenPagoForm extends BaseOrdenPagoForm
{
    public function configure()
    {
        $editable = ($this->getOption('editable')) ? : true;
        $isPost = ($this->getOption('is_post')) ? : false;
        $idUsuario = $this->getOption('id_usuario');
        $proveedores = $this->getProveedores();
        $fecha = date('Y-m-d');
        $idProyecto = $this->getOption('id_proyecto');
        $proyecto = ProyectoTable::getInstance()->find($idProyecto);


        $this->setWidgets(array(
            'id_orden_pago'       => new sfWidgetFormInputHidden(),
            'folio'               => new sfWidgetFormInputHidden(),
            'id_moneda'            => new sfWidgetFormInputHidden(),
            'id_proyecto'         => new sfWidgetFormInputHidden(),
            'id_usuario'          => new sfWidgetFormInputHidden(),
            'rut_proveedor'       => new sfWidgetFormChoice(array('choices' => $proveedores),array('class' => 'form-control input-sm select2','required' =>'true')),
            'fecha_ingreso'       => new sfWidgetFormInputHidden(),
            'fecha_contabilizado' => new sfWidgetFormInputHidden(),
        ));

        $this->setValidators(array(
            'id_orden_pago'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_orden_pago')), 'empty_value' => $this->getObject()->get('id_orden_pago'), 'required' => false)),
            'folio'               => new sfValidatorInteger(array('required' => false)),
            'id_moneda'            => new sfValidatorInteger(array('required' => false)),
            'id_proyecto'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'required' => false)),
            'id_usuario'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'required' => false)),
            'rut_proveedor'       => new sfValidatorChoice(array('choices' => array_keys($proveedores), 'required' => false)),
            'fecha_ingreso'       => new sfValidatorDateTime(array('required' => false)),
            'fecha_contabilizado' => new sfValidatorDateTime(array('required' => false)),
        ));
//        if(!$this->isNew()){
//            $rutProveedor = $this->getObject()->getRutProveedor();
//            $this->getWidget('proveedor')->setDefault($rutProveedor);
//        }
        if($this->isNew())
        {
            if(!$isPost)
            {
                $this->getObject()->setFolio($proyecto->getFolio());
                $this->getObject()->setIdMoneda($proyecto->getIdMoneda());
                $this->getObject()->setIdProyecto($idProyecto);
                $this->getObject()->setIdUsuario($idUsuario);
                $this->getObject()->setFechaIngreso($fecha);
            }
        }

        //EMBED FORMS DETALLE ORDEN DE PAGO
        $subForm = new sfForm();
        $detallesOrdenPago = $this->getObject()->getDetalleOrdenPago();
        if(count($detallesOrdenPago) > 0)
        {

            for ($i = 0; $i < count($detallesOrdenPago); $i++)
            {
                if($detallesOrdenPago[$i]->getIdDetalleOrdenPago())
                {
                    $form = new DetalleOrdenPagoForm($detallesOrdenPago[$i]);
                    $subForm->embedForm($i, $form);
                }
            }
        }
        else
        {
            $reporteDetalle = $proyecto->getReporteDetalle();
            for ($i = 0; $i < count($reporteDetalle); $i++)
            {
                $detalleOrdenPago = new DetalleOrdenPago();
                //seteo los datos de la orden de pago
                $detalleOrdenPago->OrdenPago = $this->getObject();
                $detalleOrdenPago->setCuenta($reporteDetalle[$i]['cuenta']);
                $detalleOrdenPago->setNombreCuenta($reporteDetalle[$i]['nombre_cuenta']);
                $detalleOrdenPago->setPresupuesto($reporteDetalle[$i]['presupuesto']);

                if($reporteDetalle[$i]['id_moneda'] == Moneda::CLP)
                {
                    $varEjecucion = ($reporteDetalle[$i]['ejecucion']) ? : 0;
                    $varCompromiso = ($reporteDetalle[$i]['compromiso']) ? : 0;
                    $varSaldoefectivo = ($reporteDetalle[$i]['saldo_efectivo']) ? : 0;
                }
                else
                {
                    $varEjecucion = ($reporteDetalle[$i]['ejecucion_us']) ? : 0;
                    $varCompromiso = ($reporteDetalle[$i]['compromiso_us']) ? : 0;
                    $varSaldoefectivo = ($reporteDetalle[$i]['saldoef_ectivo_us']) ? : 0;
                }
                $detalleOrdenPago->setEjecucion($varEjecucion);
                $detalleOrdenPago->setCompromiso($varCompromiso);
                $detalleOrdenPago->setSaldoEfectivo($varSaldoefectivo);

                $form = new DetalleOrdenPagoForm($detalleOrdenPago);
                $subForm->embedForm($i, $form);
            }
        }
        $this->embedForm('detalle_orden_pago', $subForm);

        //EMBED FORM ARCHIVO ORDEN PAGO
        $subFormArchivo = new sfForm();
//        $archivosOrdenPago = $this->getObject()->getArchivoOrdenPago();
//        if(count($archivosOrdenPago) > 0)
//        {
//            for ($i = 0; $i < count($archivosOrdenPago); $i++)
//            {
//                $formArchivo = new ArchivoOrdenPagoForm($archivosOrdenPago[$i]);
//                $subFormArchivo->embedForm($i, $formArchivo);
//            }
//        }
//        else
//        {
            $archivoOrdenPago = new ArchivoOrdenPago();
            $archivoOrdenPago->OrdenPago = $this->getObject();
            $formArchivo = new ArchivoOrdenPagoForm($archivoOrdenPago);
            $subFormArchivo->embedForm($i, $formArchivo);
//        }
        $this->embedForm('archivo_orden_pago', $subFormArchivo);

        //EMBED FORM BITACORA
        $bitacora = new Bitacora();
        $bitacora->setIdProyecto($idProyecto);
        $bitacora->setIdUsuario($idUsuario);
        $bitacora->setFechaCreacion($fecha);

        $formBitacora = new BitacoraForm($bitacora);
        $this->embedForm('bitacora', $formBitacora);
        //FIN EMBED FORMS

        if (!$editable){
            $this->setDisabled();
        }
        $this->widgetSchema->setNameFormat('orden_pago[%s]');
    }

    private function getProveedores()
    {
        $proveedor = new Proveedor();
        $listaProveedores = $proveedor->getListaProveedores();
        return $listaProveedores;
    }

    private function setDisabled()
    {
        foreach($this->widgetSchema->getPositions() as $column_name)
        {
            if (isset($this->widgetSchema[$column_name]) && $column_name != '_csrf_token')
            {
                $this->getWidget($column_name)->setAttribute("disabled", "disabled" );
            }
        }
    }
}
