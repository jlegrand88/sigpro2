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
            'observacion' => new sfWidgetFormTextarea( array(), array( 'class' => 'form-control input-sm', 'rows' => "3", 'cols' => "170",'required' => "true" ) )
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
            'observacion'    => new sfValidatorString(array('required' => true))
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

        $idOrdenPago = $this->getObject()->getIdOrdenPago();
        //EMBED FORMS DETALLE ORDEN DE PAGO
        $subForm = new sfForm();
        if($idOrdenPago)
        {
            $detallesOrdenPago = DetalleOrdenPagoTable::getInstance()->findByIdOrdenPago($this->getObject()->getIdOrdenPago());
        }else{
            $detallesOrdenPago = $this->getObject()->getDetalleOrdenPago();
        }

        if(count($detallesOrdenPago) > 0)
        {
            for ($i = 0; $i < count($detallesOrdenPago); $i++)
            {
                if($detallesOrdenPago[$i]->getIdDetalleOrdenPago())
                {
                    $cuenta = $detallesOrdenPago[$i]['cuenta'];
                    $detalleSaldosCuenta = DetalleOrdenPagoTable::getInstance()->getDetalleSaldosCuenta($cuenta);
                    $form = new DetalleOrdenPagoForm($detallesOrdenPago[$i]);
                    $form->setDefault('presupuesto',$detalleSaldosCuenta['presupuesto']);
                    if($detalleSaldosCuenta['id_moneda'] != Moneda::CLP)
                    {
                        $varEjecucion = ($detalleSaldosCuenta['ejecucion']) ? : 0;
                        $varCompromiso = ($detalleSaldosCuenta['compromiso']) ? : 0;
                        $varSaldoefectivo = ($detalleSaldosCuenta['saldo_efectivo']) ? : 0;
                    }
                    else
                    {
                        $varEjecucion = ($detalleSaldosCuenta['ejecucion_us']) ? : 0;
                        $varCompromiso = ($detalleSaldosCuenta['compromiso_us']) ? : 0;
                        $varSaldoefectivo = ($detalleSaldosCuenta['saldo_efectivo_us']) ? : 0;
                    }

                    if($varSaldoefectivo == 0 AND $varEjecucion != $detalleSaldosCuenta['presupuesto'])
                    {
                        $varSaldoefectivo = $detalleSaldosCuenta['presupuesto'];
                    }
                    $form->setDefault('ejecucion',$varEjecucion);
                    $form->setDefault('compromiso',$varCompromiso);
                    $form->setDefault('saldo_efectivo',$varSaldoefectivo);
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
                    $varSaldoefectivo = ($reporteDetalle[$i]['saldo_efectivo_us']) ? : 0;
                }
                
                if($varSaldoefectivo == 0 AND $varEjecucion != $reporteDetalle[$i]['presupuesto'])
                {
                    $varSaldoefectivo = $reporteDetalle[$i]['presupuesto'];
                }
                $form = new DetalleOrdenPagoForm($detalleOrdenPago);
                $form->setDefault('presupuesto',$reporteDetalle[$i]['presupuesto']);
                $form->setDefault('ejecucion',$varEjecucion);
                $form->setDefault('compromiso',$varCompromiso);
                $form->setDefault('saldo_efectivo',$varSaldoefectivo);
                $subForm->embedForm($i, $form);
            }
        }
        $this->embedForm('detalle_orden_pago', $subForm);
        $archivoOrdenPago = new ArchivoOrdenPago();
        $archivoOrdenPago->OrdenPago = $this->getObject();
        $formArchivo = new ArchivoOrdenPagoForm($archivoOrdenPago);
        $this->embedForm('archivo_orden_pago', $formArchivo);
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

//    public function updateObjectEmbeddedForms($values, $forms = null)
//    {
//        var_dump($values);die();
//        if($values["archivo_orden_pago"]['archivo'])
//        {
//            $archivo = $values["archivo_orden_pago"]['archivo'];
//
//            $nombreArchivo = $archivo->getOriginalName();
//            $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getIdProyecto(), $this->getObject()->getIdOrdenPago()), sfConfig::get('app_ruta_documentos_orden_pago'));
//            die(var_dump($values));
////            if (!is_dir($ruta))
////            {
////                @mkdir($ruta, 0777, true);
////            }
//            $object->setRuta($ruta);
//            $object->setFechaUpload(date('Y-m-d'));
//            $object->setNombre($nombreArchivo);
//        }
//        return parent::updateObjectEmbeddedForms($values, $forms);
//    }


//    public function saveEmbeddedForms($con = null, $forms = null)
//    {
//        if (null === $con)
//        {
//            $con = $this->getConnection();
//        }
//
//        if (null === $forms)
//        {
//            $forms = $this->getEmbeddedForms();
//        }
//
//        foreach ($forms as $form)
//        {
//            if ($form instanceof sfFormObject)
//            {
//                if($form->getName() && $form->getName() == "archivo_orden_pago")
//                {
//                    die(var_dump($form->getValues()));
//                    $form->save($con);
//                    $form->saveEmbeddedForms($con);
//                }
//                else
//                {
//                    $form->getObject()->save($con);
//                    $form->saveEmbeddedForms($con);
//                }
//            }
//            else
//            {
//                $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
//            }
//        }
//    }
//    protected function doSave($con = null)
//    {
//        if (null === $con)
//        {
//            $con = $this->getConnection();
//        }
//        $valores = $this->values;
//        $this->updateObject();
//
//        $this->getObject()->save($con);
//
//        $this->updateObjectEmbeddedForms($valores);
//        // embedded forms
//        $this->saveEmbeddedForms($con);
//    }
//    public function processValues($values)
//    {
//        // see if the user has overridden some column setter
//        $valuesToProcess = $values;
//        foreach ($valuesToProcess as $field => $value)
//        {
//            $method = sprintf('update%sColumn', $this->camelize($field));
//
//            if (method_exists($this, $method))
//            {
//                if (false === $ret = $this->$method($value))
//                {
//                    unset($values[$field]);
//                }
//                else
//                {
//                    $values[$field] = $ret;
//                }
//            }
//            else
//            {
//                // save files
//                if ($this->validatorSchema[$field] instanceof sfValidatorFile)
//                {
//                    $values[$field] = $this->processUploadedFile($field, null, $valuesToProcess);
//                }
//            }
//        }
//
//        return $values;
//    }
//    public function updateObject($values = null)
//    {
//        if (null === $values)
//        {
//            $values = $this->values;
//        }
//
//        $values = $this->processValues($values);
//
//        $this->doUpdateObject($values);
//
//        // embedded forms
//        if (null === $forms)
//        {
//            $forms = $this->embeddedForms;
//        }
//
//        foreach ($forms as $name => $form)
//        {
//            if (!isset($values[$name]) || !is_array($values[$name]) || $name == "archivo_Orden_pago")
//            {
//                die($name);
//                continue;
//            }
//
//            if ($form instanceof sfFormObject)
//            {
//                $form->updateObject($values[$name]);
//            }
//            else
//            {
//                $this->updateObjectEmbeddedForms($values[$name], $form->getEmbeddedForms());
//            }
//        }
//
//        return $this->getObject();
//    }
}
