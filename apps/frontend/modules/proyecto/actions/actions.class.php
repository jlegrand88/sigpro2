<?php

/**
 * proyecto actions.
 *
 * @package    sigpro
 * @subpackage proyecto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectoActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
    $this->forward('default', 'module');
    }

    public function executeIngresoProyecto(sfWebRequest $request)
    {
        $this->tipoDocumento = 1;
        if($request->hasParameter('editable'))
        {
            $this->editable = $request->getParameter('editable');
            if(is_null($this->editable))
            {
                $this->editable = 0;
            }
        }
        else
        {
            $this->editable = 1;
        }

        $idUsuario = $this->getUser()->getAttribute('id');
        $this->permisosUsuario = $permisosUsuario = Usuario::getPermisos($idUsuario);

        if($request->getParameter('id_proyecto'))
        {
            $idProyecto = $request->getParameter('id_proyecto');
            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $this->movimientos = $proyecto->getPresupuesto();
            $this->archivosContrato = $proyecto->getArchivoContrato();
        }
        else
        {
            $proyecto = null;
            $idProyecto = null;
            $this->movimientos = null;
            $this->archivosContrato = null;
        }
        $this->proyecto = $proyecto;
        $this->form = new ProyectoForm($proyecto);

        if(!$this->form->getObject()->getIdCreador())
        {
            $this->form->setDefault('id_creador',$idUsuario);
        }
        if(!$this->form->getObject()->getIdEstadoProyecto())
        {
            $this->form->setDefault('id_estado_proyecto',EstadoProyecto::POR_APROBAR);
        }
        $this->form->setDefault('id_responsable_proy',1);
        $this->form->setDefault('id_responsable_cont',1);
        if(!$this->form->getObject()->getFechaCreacion())
        {
            $this->form->setDefault('fecha_creacion',date('Y-m-d'));
        }

        $this->idInbox = $idInbox = ($request->getParameter('id_inbox')) ? $request->getParameter('id_inbox') : null;

        if($idInbox)
        {
            $inbox = InboxTable::getInstance()->find($idInbox);
            if($inbox->getIdAccion())
            {
                $accion = AccionTable::getInstance()->find($inbox->getIdAccion());
                $this->accionUsuario = $accion->getIdAccion();

                if(in_array($accion->getIdAccion(),$permisosUsuario))
                {
                    $this->permiso = true;
                }
                else
                {
                    $this->permiso = false;
                    $this->alerta = "No posee los privilegios para la acción que desea realizar, favor ponerse en contacto con el administrador.";
                }
                $pregunta = $accion->getPregunta();
                $this->accionUsuarioPregunta = (isset($pregunta)) ? utf8_encode($pregunta) : null;
                $this->lblAccion = $accion->getNombre();
                $this->accionEstadoFinal = $accion->getIdEstadoFinal();
            }
            if(!$inbox->getFechaRecepcion())
            {
                $inbox->setFechaRecepcion(date('Y-m-d'));
                $inbox->setIdTipoDocumento(1);
                $inbox->save();
            }
        }
        else{
            $this->accionUsuarioPregunta = null;
            $this->accionEstadoFinal = null;
            $this->accionUsuario = Accion::CREAR;
            if(in_array(Accion::CREAR,$permisosUsuario) || isset($idProyecto))
            {
                $this->permiso = true;
            }
            else
            {
                $this->permiso = false;
                $this->alerta = "No posee los privilegios para crear un proyecto, favor ponerse en contacto con el administrador.";
            }
        }
        $this->listaUsuarios = UsuarioTable::getInstance()->getAllUsers();
        if($request->isMethod(sfRequest::POST))
        {
            $this->form->bind($request->getParameter($this->form->getName()),$request->getFiles($this->form->getName()));
            if ($this->form->isValid())
            {
                $esNuevo = $this->form->isNew();
                $this->form->save();
                $idProyecto = $this->form->getObject()->getIdProyecto();
                if($esNuevo)
                {
                    $inbox = new Inbox();
                    $inbox->setIdProyecto($idProyecto);
                    $inbox->setFechaDespacho(date('Y-m-d'));
                    $inbox->setIdEmisor($idUsuario);
                    $inbox->setIdDestinatario($idUsuario);
                    $inbox->setFechaRecepcion(date('Y-m-d'));
                    $inbox->setIdTipoDocumento(1);
                    $inbox->setIdAccion(Accion::CREAR);
                    $inbox->save();
                    $idInbox = $inbox->getIdInbox();
                    $showAlert = 1;
                }
                else
                {
                    $showAlert = 2;
                }
            }
            $this->redirect($this->generateUrl('ingreso_proyecto',array('id_proyecto' => $idProyecto,'id_inbox' => $idInbox,'a'=>$showAlert)));
        }
        if($request->hasParameter('a'))
        {
            if($request->getParameter('a') == 1)
            {
                $this->alertaSuccess = "El Proyecto ha sido creado!";
            }elseif ($request->getParameter('a') == 2){
                $this->alertaSuccess = "El Proyecto ha sido actualizado!";
            }
        }
    }
    
    public function executeLoadMovimientoForm(sfWebRequest $request)
    {
        if($request->getParameter('idPresupuesto'))
        {
            $presupuesto = PresupuestoTable::getInstance()->find($request->getParameter('idPresupuesto'));
            $form = new PresupuestoForm($presupuesto);
        }
        else 
        {
            $idProyecto = $request->getParameter('idProyecto');
            $form = new PresupuestoForm();
            $form->setDefault('id_proyecto', $idProyecto);
        }
        return $this->renderPartial('loadMovimientoForm',array('form'=>$form));
    }

    public function executeProcesaMovimientoForm(sfWebRequest $request)
    {
        if($request->isMethod(sfRequest::POST))
        {
            if($request->getParameter('presupuesto')['id_presupuesto'])
            {
                $idPresupuesto = $request->getParameter('presupuesto')['id_presupuesto'];
                $presupuesto = PresupuestoTable::getInstance()->findOneByIdPresupuestoAndIdProyecto($idPresupuesto,$request->getParameter('presupuesto')['id_proyecto']);
            }
            else
            {
                $presupuesto = null;
            }
            $form = new PresupuestoForm($presupuesto);
            $form->bind($request->getParameter($form->getName()));

            if($form->isValid())
            {
                if($form->getObject()->isNew())
                {
                    $mensaje = "Movimiento ingresado!";
                }
                else{
                    $mensaje = "Movimiento actualizado!";
                }
                $obj = $form->save();
                if(!$request->getParameter('presupuesto')['id_presupuesto'])
                {
                    $form = new PresupuestoForm($obj);
                }
                $this->getUser()->setFlash('success', $mensaje);
            }
            return $this->renderPartial('loadMovimientoForm',array('form'=>$form));
        }
    }

    public function executeLoadTablaMovimientos(sfWebRequest $request)
    {
        $idProyecto = $request->getParameter('idProyecto');
        if($idProyecto)
        {
            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $movimientos = $proyecto->getPresupuesto();
        }
        
        $accionUsuario = $request->getParameter('au');
        $editable = $request->getParameter('editable');
        return $this->renderPartial('tablaMovimientos',array('proyecto' => $proyecto, 'editable' => $editable, 'accionUsuario' => $accionUsuario, 'movimientos' => $movimientos));
    }

    public function executeDeleteMovimiento(sfWebRequest $request)
    {
        $idPresupuesto = $request->getParameter('idPresupuesto');
        if($idPresupuesto)
        {
            $presupuesto = PresupuestoTable::getInstance()->find($idPresupuesto);
            $presupuesto->delete();
            exit;
        }
    }

    public function executeDetallePpto(sfWebRequest $request)
    {
        $idProyecto = $request->getParameter('id');

        $proyecto = ProyectoTable::getInstance()->find($idProyecto);
        $montoTotal = $proyecto->getMontoTotal();
        $numContable = $proyecto->getNumeroContable();
        $idMoneda    = $proyecto->getIdMoneda();
        $siglaContable = $proyecto->getSiglaContable();
        $overhead = $proyecto->getOverheadAutorizado()/100;

        $sumIngresos = PresupuestoTable::getSumIngresos($idProyecto);
        $sumEgresos = PresupuestoTable::getSumEgresos($idProyecto);
        $sumOverhead = PresupuestoTable::getSumOverhead($idProyecto);

        $sumIngresoReales = MovimientosContablesTable::sumIngresoReales($idProyecto);
        $sumIngresoRealesUs = MovimientosContablesTable::sumIngresoRealesUs($idProyecto);
        $sumGastosReales = MovimientosContablesTable::sumGastosReales($idProyecto);
        $sumGastosRealesUs = MovimientosContablesTable::sumGastosRealesUs($idProyecto);
        $sumCompromisos = MovimientosContablesTable::sumCompromisos($numContable);
        $sumCompromisosUs = MovimientosContablesTable::sumCompromisosUs($numContable);

        $montoPpto = $sumOverhead; //( $montoTotal * $overhead ) + $sumIngresos - $sumEgresos;
        $montoEjecutado = $montoTotal - ($sumEgresos * $overhead);

        $data['idProyecto'] = $idProyecto;
        $data['siglaContable'] = $siglaContable;
        $data['sumEgresos'] = ($sumEgresos) ? $sumEgresos : 0;
        $data['sumIngresos'] = ($sumIngresos) ? $sumIngresos : 0;
        $data['sumIngresosReales'] = $sumIngresoReales;
        $data['sumIngresosRealesUs'] = $sumIngresoRealesUs;
        $data['sumGastosReales'] = $sumGastosReales;
        $data['sumGastosRealesUs'] = $sumGastosRealesUs;
        $data['sumCompromisos'] = $sumCompromisos;
        $data['sumCompromisosUs'] = $sumCompromisosUs;
        $data['numContable'] = $numContable;
        $data['idMoneda'] = $idMoneda;
        $data['montoPpto'] = $montoPpto;

        $this->data = $data;
    }

    public function executeCalcularOverhead(sfWebRequest $request)
    {
        $idProyecto = $request->getParameter('idProyecto');
        $idPresupuesto = $request->getParameter('idPresupuesto');
        
        if($idProyecto)
        {
            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $this->proyecto = $proyecto;
        }

        $PresupuestoOVH = PresupuestoTable::getInstance()->find($idPresupuesto);
        $periodo = $PresupuestoOVH->getPeriodo();

        $sumEgresosEnero = PresupuestoTable::getSumEgresosPorMes($idProyecto, "enero", $periodo);
        $sumEgresosFebrero = PresupuestoTable::getSumEgresosPorMes($idProyecto, "febrero", $periodo);
        $sumEgresosMarzo = PresupuestoTable::getSumEgresosPorMes($idProyecto, "marzo", $periodo);
        $sumEgresosAbril = PresupuestoTable::getSumEgresosPorMes($idProyecto, "abril", $periodo);
        $sumEgresosMayo = PresupuestoTable::getSumEgresosPorMes($idProyecto, "mayo", $periodo);
        $sumEgresosJunio = PresupuestoTable::getSumEgresosPorMes($idProyecto, "junio", $periodo);
        $sumEgresosJulio = PresupuestoTable::getSumEgresosPorMes($idProyecto, "julio", $periodo);
        $sumEgresosAgosto = PresupuestoTable::getSumEgresosPorMes($idProyecto, "agosto", $periodo);
        $sumEgresosSeptiembre = PresupuestoTable::getSumEgresosPorMes($idProyecto, "septiembre", $periodo);
        $sumEgresosOctubre = PresupuestoTable::getSumEgresosPorMes($idProyecto, "octubre", $periodo);
        $sumEgresosNoviembre = PresupuestoTable::getSumEgresosPorMes($idProyecto, "noviembre", $periodo);
        $sumEgresosDiciembre = PresupuestoTable::getSumEgresosPorMes($idProyecto, "diciembre", $periodo);

        $overheadAutorizado = $proyecto->getOverheadAutorizado();
        if ( $overheadAutorizado == 0)
        {
            $PresupuestoOVH->setEnero($sumEgresosEnero);
            $PresupuestoOVH->setFebrero($sumEgresosFebrero);
            $PresupuestoOVH->setMarzo($sumEgresosMarzo);
            $PresupuestoOVH->setAbril($sumEgresosAbril);
            $PresupuestoOVH->setMayo($sumEgresosMayo);
            $PresupuestoOVH->setJunio($sumEgresosJunio);
            $PresupuestoOVH->setJulio($sumEgresosJulio);
            $PresupuestoOVH->setAgosto($sumEgresosAgosto);
            $PresupuestoOVH->setSeptiembre($sumEgresosSeptiembre);
            $PresupuestoOVH->setOctubre($sumEgresosOctubre);
            $PresupuestoOVH->setNoviembre($sumEgresosNoviembre);
            $PresupuestoOVH->setDiciembre($sumEgresosDiciembre);
        }
        else
        {
            $PresupuestoOVH->setEnero($sumEgresosEnero * ($overheadAutorizado / 100));
            $PresupuestoOVH->setFebrero($sumEgresosFebrero * ($overheadAutorizado / 100));
            $PresupuestoOVH->setMarzo($sumEgresosMarzo * ($overheadAutorizado / 100));
            $PresupuestoOVH->setAbril($sumEgresosAbril * ($overheadAutorizado / 100));
            $PresupuestoOVH->setMayo($sumEgresosMayo * ($overheadAutorizado / 100));
            $PresupuestoOVH->setJunio($sumEgresosJunio * ($overheadAutorizado / 100));
            $PresupuestoOVH->setJulio($sumEgresosJulio * ($overheadAutorizado / 100));
            $PresupuestoOVH->setAgosto($sumEgresosAgosto * ($overheadAutorizado / 100));
            $PresupuestoOVH->setSeptiembre($sumEgresosSeptiembre * ($overheadAutorizado / 100));
            $PresupuestoOVH->setOctubre($sumEgresosOctubre * ($overheadAutorizado / 100));
            $PresupuestoOVH->setNoviembre($sumEgresosNoviembre * ($overheadAutorizado / 100));
            $PresupuestoOVH->setDiciembre($sumEgresosDiciembre * ($overheadAutorizado / 100));
        }
        $PresupuestoOVH->save();
        exit;
    }

    public function executeEjecutarAccionUsuario(sfWebRequest $request)
    {
        $idAccion = ($request->getParameter('idAccion')) ? $request->getParameter('idAccion') : null;
        $idProyecto = ($request->getParameter('idProyecto')) ? $request->getParameter('idProyecto') : null;

        if(isset($idAccion) && isset($idProyecto))
        {
            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $accion = AccionTable::getInstance()->find($idAccion);

            if($idAccion == Accion::CONTABILIZAR)
            {
                $proyecto->setIdEstadoProyecto($accion->getIdEstadoFinal());
                $proyecto->save();
                $proyecto->saveRespaldo();
            }
            elseif ($idAccion == Accion::APROBAR)
            {
                $proyecto->setIdEstadoProyecto($accion->getIdEstadoFinal());
                $proyecto->save();
            }
            echo json_encode('El proyecto se encuentra '.$proyecto->getEstadoProyecto()->getDescripcion());
        }
        else
        {
            echo false;
        }
        exit;
    }

    public function executeDespacharProyecto(sfWebRequest $request)
    {
        $idProyecto = ($request->getParameter('id_proyecto')) ? $request->getParameter('id_proyecto') : null;
        $folio = ($request->getParameter('id_folio')) ? $request->getParameter('id_folio') : null;

        if($request->isMethod(sfRequest::POST))
        {
            $bitacora = new Bitacora();
            $bitacora->setIdProyecto($idProyecto);
            $bitacora->setIdAccion($request->getParameter('accion_usuario'));
            $bitacora->setIdUsuario($this->getUser()->getAttribute('id'));
            $bitacora->setFechaCreacion(date('Y-m-d'));
            $bitacora->setObservacion($request->getParameter('observacion'));
            $bitacora->save();

            if($request->getParameter('id_inbox'))
            {
                $inbox = InboxTable::getInstance()->find($request->getParameter('id_inbox'));
            }
            else
            {
                $inbox = new Inbox();
            }
            $inbox->setIdProyecto($idProyecto);
            $inbox->setFechaDespacho(date('Y-m-d'));
            $inbox->setIdEmisor($this->getUser()->getAttribute('id'));
            $inbox->setIdDestinatario($request->getParameter('id_destinatario'));
            $inbox->setIdTipoDocumento(1);

            if($request->getParameter('id_accion'))
            {
                $inbox->setIdAccion($request->getParameter('id_accion'));
            }
            if(isset($folio))
            {
                $inbox->folio = $folio;
            }
            $inbox->save();

            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $accion = AccionTable::getInstance()->find($request->getParameter('id_accion'));
            $proyecto->setIdEstadoProyecto($accion->getIdEstadoInicial());
            $proyecto->save();
        }
        exit;
    }

    public function executeOrdenPago(sfWebRequest $request)
    {
        $this->listaUsuarios = UsuarioTable::getInstance()->getAllUsers();
        $idUsuario = $this->getUser()->getAttribute('id');
        $listaProyectos = UsuarioTable::getInstance()->getListaProyectosResponsable($idUsuario);
        $this->listaProyectos = isset($listaProyectos) ? $listaProyectos : null;
        $this->editable = true;
        $this->idDeleteArchivo = null;
        $this->idInbox = $idInbox = ($request->getParameter('id_inbox')) ? $request->getParameter('id_inbox') : null;

        $this->accionUsuario = null;
        $this->accionUsuarioPregunta = null;
        $this->accionEstadoFinal = null;
        $this->tipoDocumento = 2;
        if($request->isMethod(sfRequest::POST))
        {
            $this->ordenPago = $ordenPago = (OrdenPagoTable::getInstance()->find($request->getParameter('orden_pago')['id_orden_pago'])) ? : null;
            $this->idProyecto = $idProyecto = $request->getParameter('orden_pago')['id_proyecto'];
            $this->proyecto = $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $form = new OrdenPagoForm($ordenPago,array('is_post' => true,'id_proyecto' => $idProyecto,'id_usuario' => $idUsuario));
            $form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
            $this->form = $form;
            if($form->isValid())
            {
//                var_dump($request->getFiles($form->getName()));die();
                if ($form->getObject()->isNew()) {
                    $mensaje = "Orden de pago ingresada!";
                } else {
                    $mensaje = "Orden de pago actualizada!";
                }
                $this->ordenPago = $newOrdenPago = $form->save();
                $this->getUser()->setFlash('success', $mensaje);
                $this->idProyecto = $newOrdenPago->getIdProyecto();
                $file = $request->getFiles($form->getName());
                
                if ($file['archivo_orden_pago']['archivo']['name'])
                {
                    $this->idDeleteArchivo = ArchivoOrdenPagoTable::getInstance()->getIdArchivoDelete($newOrdenPago->getIdOrdenPago());
                }
                $this->form = new OrdenPagoForm($newOrdenPago,array('is_post' => true,'id_proyecto' =>  $this->idProyecto,'id_usuario' => $idUsuario));
            }
        }
        else 
        {
            //de momento no deshabilitar ningun campo.
            $this->editable = $editable = ($request->hasParameter('id_inbox')) ? false : true;
            $this->idProyecto = $idProyecto = ($request->hasParameter('id_proyecto')) ?  $request->getParameter('id_proyecto') : null;
            $this->proyecto = $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $this->ordenPago = null;
            if (isset($idInbox))
            {
                $inbox = InboxTable::getInstance()->find($idInbox);
                $idProyecto = $inbox->getIdProyecto();
                $idOrdenPago = $inbox->getIdOrdenPago();
                $this->proyecto = $proyecto = ProyectoTable::getInstance()->find($idProyecto);
                $this->listaProyectos = [$proyecto->getIdProyecto() =>  $proyecto->getNumeroContable()." - ".$proyecto->getSiglaContable()];
                $this->ordenPago = $ordenPago = OrdenPagoTable::getInstance()->find($idOrdenPago);
//                die($idProyecto);
                $this->form = new OrdenPagoForm($ordenPago, array('editable' => $editable,'id_proyecto' =>  $idProyecto,'id_usuario' => $idUsuario));
            }
        }
    }
    
    public function executeLoadOrdenPagoForm(sfWebRequest $request)
    {
        $idUsuario = $this->getUser()->getAttribute('id');
        $idProyecto = ($request->hasParameter('id_proyecto')) ? $request->getParameter('id_proyecto') : null;
        $proyecto = (isset($idProyecto)) ? ProyectoTable::getInstance()->find($idProyecto) : null;
//        $ordenPago = (!$proyecto->getOrdenPago()->isNew()) ? $proyecto->getOrdenPago() : null;
        $ordenPago = null;
        $form = new OrdenPagoForm($ordenPago,array('id_usuario' => $idUsuario, 'id_proyecto' => $idProyecto));
        return $this->renderPartial('proyecto/ordenPagoForm',array('form' => $form,'ordenPago' => $ordenPago, 'idDeleteArchivo' => null));
    }

    public function executeEliminarArchivoOrdenPago(sfWebRequest $request)
    {
        $idArchivo = $request->getParameter('id');
        $archivo = ArchivoOrdenPagoTable::getInstance()->find($idArchivo);
        unlink($archivo->getRuta());
        $ordenPago = $archivo->getOrdenPago();
        $archivo->delete();
        return $this->renderPartial('proyecto/tablaArchivosOrdenPago',array('ordenPago' => $ordenPago, 'idDeleteArchivo' => null));
    }

    public function executeEliminarArchivoContrato(sfWebRequest $request)
    {
        $idArchivo = $request->getParameter('id');
        $archivo = ArchivoContratoTable::getInstance()->find($idArchivo);
        unlink($archivo->getRuta());
        $archivo->delete();
        $archivosContrato = $archivo->getProyecto()->getArchivoContrato();
        return $this->renderPartial('proyecto/tablaArchivosContrato',array('archivosContrato' => $archivosContrato));
    }

    public function executeDespacharOrden(sfWebRequest $request)
    {
        $idProyecto = ($request->getParameter('id_proyecto')) ? $request->getParameter('id_proyecto') : null;
        $idOrdenPago = ($request->getParameter('id_orden_pago')) ? $request->getParameter('id_orden_pago') : null;
        if($request->isMethod(sfRequest::POST))
        {
            if($request->getParameter('id_inbox'))
            {
                $inbox = InboxTable::getInstance()->find($request->getParameter('id_inbox'));
            }
            else
            {
                $inbox = new Inbox();
            }
            $inbox->setIdProyecto($idProyecto);
            $inbox->setIdOrdenPago($idOrdenPago);
            $inbox->setFechaDespacho(date('Y-m-d'));
            $inbox->setIdEmisor($this->getUser()->getAttribute('id'));
            $inbox->setIdDestinatario($request->getParameter('id_destinatario'));
            $inbox->setIdTipoDocumento($request->getParameter('id_tipo_documento'));
            $inbox->save();
        }
        exit;
    }

    public function executeReporteInformes(sfWebRequest $request)
    {
        $idUsuario = $this->getUser()->getAttribute('id');
        $usuario = UsuarioTable::getInstance()->find($idUsuario);
        $this->accionUsuario = $idPerfilReporte = $usuario->getIdPerfilReporte();
        $this->pais = $pais =$usuario->getPais()->getDescripcion();
//        switch ($idPerfilReporte)
//        {
//            case 5://OFICINA PAIS
//                $this->listaTotalProyectos = RptGeneralProyectoTable::getInstance()->getListadoProyectosValoresPais($pais);
//                break;
//            case 7://RESPONSABLE
//                $this->listaTotalProyectos = RptGeneralProyectoTable::getInstance()->getListadoProyectosValoresPorResponsable($idUsuario);
//                break;
//            case 8://GRUPO
//                $this->grupo = $usuario->getGrupoProyecto();
//                $this->listaTotalProyectos = RptGeneralProyectoTable::getInstance()->getListadoProyectosValoresPorGrupo($this->grupo);
//                break;
//            default://6 o 9
//                $this->listaTotalProyectos = RptGeneralProyectoTable::getInstance()->getListadoProyectosValores();
//                break;
//        }
        $this->listaTotalProyectos = RptGeneralProyectoTable::getInstance()->getListadoProyectosValores();
    }

    public function executeReporteInformeDetalle(sfWebRequest $request)
    {
        $this->numContable = $numContable = ($request->hasParameter('numcont')) ? $request->getParameter('numcont') : null;
        $this->sigla = ($request->hasParameter('sigla')) ? $request->getParameter('sigla') : null;
        $this->listaTotalProyectosCuenta = ProyectoTable::getInstance()->getReporteDetallePorNumeroContable($numContable);
    }

    public function executeReporteInformeDetalleTotal(sfWebRequest $request)
    {
        $this->numContable = $numContable = ($request->hasParameter('numcont')) ? $request->getParameter('numcont') : null;
        $this->sigla = ($request->hasParameter('sigla')) ? $request->getParameter('sigla') : null;
        $this->listaTotalProyectosCuenta = MovimientosContablesTable::getInstance()->getReporteDetalleCuentas($numContable);
    }

    public function executeGastoPais(sfWebRequest $request)
    {
        $idUsuario = $this->getUser()->getAttribute('id');
        if($request->isMethod(sfRequest::POST))
        {
            $this->idProyecto = $idProyecto = $request->getParameter('id_proyecto');
            if(isset($_FILES['file']['name']))
            {
                $fileName = basename($_FILES['file']['name']);
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                if($ext == "xls")
                {
                    $tmpName = $_FILES['file']['tmp_name'];
                    try
                    {
                        $inputFileType = PHPExcel_IOFactory::identify($tmpName); //Identify the file
                        $objReader = PHPExcel_IOFactory::createReader($inputFileType); //Creating the reader
                        $objPHPExcel = $objReader->load($tmpName); //Loading the file
                    }
                    catch (Exception $e)
                    {
                        $this->logMessage('Error loading file "' . pathinfo($tmpName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                    }

                    $erroresArchivo = GastoPais::validaArchivo($idProyecto, $objPHPExcel);
                    $this->errors = "";
                    if ($erroresArchivo)
                    {
                        $this->errors = $erroresArchivo;
                    }
                    else
                    {
                        //  Get worksheet dimensions
                        $sheet = $objPHPExcel->getSheet(0);     //Selecting sheet 0
                        $highestRow = $sheet->getHighestRow();     //Getting number of rows
                        $highestColumn = $sheet->getHighestColumn();     //Getting number of columns

                        $fecha = date('Y/m/d H:i:s');
                        $fileName = md5($fecha . $fileName) . '.' . $ext;
                        $rutaDestino = preg_replace("/@proyecto/", $idProyecto, sfConfig::get('app_ruta_documentos_gasto_pais'));
                        if (!is_dir($rutaDestino) && !mkdir($rutaDestino, 0777, true)) {
                            $this->logMessage("Error creating folder $rutaDestino");
                        }
                        $rutaDestinoFinal = preg_replace("/@proyecto/", $idProyecto, sfConfig::get('app_ruta_documentos_gasto_pais')) . DIRECTORY_SEPARATOR . $fileName;

                        $archivoGastoPais = new ArchivoGastoPais();
                        $archivoGastoPais->setIdUsuario($idUsuario);
                        $archivoGastoPais->setNombre($fileName);
                        $archivoGastoPais->setRuta($rutaDestinoFinal);
                        $archivoGastoPais->setFecha($fecha);
                        if ($request->hasParameter('vigente') && $request->getParameter('vigente') == 'on') {
                            $archivoGastoPais->setVigente(1);
                        }
                        $archivoGastoPais->save();
                        //  Loop through each row of the worksheet in turn
                        for ($row = 1; $row <= $highestRow; $row++) {
                            if ($row > 1) {
                                //  Read a row of data into an array
                                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                                $data = $rowData[0];

                                $gastoPais = new GastoPais();
                                $gastoPais->setIdProyecto($idProyecto);
                                $gastoPais->setIdArchivoGastoPais($archivoGastoPais->getIdArchivoGastoPais());
                                $gastoPais->setCuenta($data[0]);
                                $gastoPais->setIdTipoMovimiento($data[1]);
                                $gastoPais->setNombreCuenta($data[2]);
                                $gastoPais->setPeriodo($data[3]);
                                $gastoPais->setEnero($data[4]);
                                $gastoPais->setFebrero($data[5]);
                                $gastoPais->setMarzo($data[6]);
                                $gastoPais->setAbril($data[7]);
                                $gastoPais->setMayo($data[8]);
                                $gastoPais->setJunio($data[9]);
                                $gastoPais->setJulio($data[10]);
                                $gastoPais->setAgosto($data[11]);
                                $gastoPais->setSeptiembre($data[12]);
                                $gastoPais->setOctubre($data[13]);
                                $gastoPais->setNoviembre($data[14]);
                                $gastoPais->setDiciembre($data[15]);
                                if (strtolower($data[16]) == "x" || $data[16] == "1" || strtolower($data[16]) == "s" || strtolower($data[16]) == "y" || strtolower($data[16]) == "si" ||
                                    strtolower($data[16]) == "yes" || strtolower($data[16]) == "true"
                                ) {
                                    $gastoPais->setCuentaOverhead(1);
                                } else {
                                    $gastoPais->setCuentaOverhead(0);
                                }
                                $gastoPais->save();
                                //actualizo reporte general proyecto
                                $gastoPais->sumarValoresAReporteGeneral();
                            }
                        }
                        move_uploaded_file($tmpName, $rutaDestinoFinal);
                    }
                }
            }
            $this->archivosGastoPais = ArchivoGastoPaisTable::getInstance()->getArchivos($idProyecto,$idUsuario);
        }
        if(isset($idUsuario))
        {
            $listaProyectos = UsuarioTable::getInstance()->getListaProyectosResponsable($idUsuario);
            $this->archivos = ArchivoGastoPaisTable::getInstance()->findByIdUsuario($idUsuario);
            $this->listaProyectos = isset($listaProyectos) ? $listaProyectos : null;
        }
    }

    public function executeDescargarFormato(sfWebRequest $request)
    {
        $docName = $request->getParameter('doc');
        $ruta = sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.'formatos'.DIRECTORY_SEPARATOR.$docName;
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$docName" );
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Pragma: public");
        readfile($ruta);
        exit;
    }

    public function executeGrillaGastosPais(sfWebRequest $request)
    {
        $idUsuario = $this->getUser()->getAttribute('id');
        $idProyecto = $request->getParameter('id_proyecto');
        $archivosGastoPais = ArchivoGastoPaisTable::getInstance()->getArchivos($idProyecto,$idUsuario);
        return $this->renderPartial("grillaArchivosGastoPais",array('archivos' => $archivosGastoPais,'idProyecto' => $idProyecto));
    }

    public function executeEliminarArchivoGastoPais(sfWebRequest $request)
    {
        $idArchivo = $request->getParameter('id');
        $archivo = ArchivoGastoPaisTable::getInstance()->find($idArchivo);
        foreach ($archivo->getGastoPais() as $gastoPais)
        {
            $gastoPais->restarValoresAReporteGeneral();
        }
        unlink($archivo->getRuta());
        $archivo->delete();
        exit;
    }

    public function executeGetMonedaProyecto(sfWebRequest $request)
    {
        $proyecto = ProyectoTable::getInstance()->find($request->getParameter('id_proyecto'));
        echo '<b>MONEDA DE PROYECTO:</b> '.$proyecto->getMoneda();
        exit;
    }
    
    public function executeDescargarODP(sfWebRequest $request)
    {
        sfConfig::set('sf_web_debug', false);
        ob_start();
        $config = sfTCPDFPluginConfigHandler::loadConfig();
        $ordenDePago = OrdenPagoTable::getInstance()->find($request->getParameter('id'));
        $pdf = new sfTCPDF();

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SIGPRO');
        $pdf->SetTitle('ORDEN DE PAGO');
//        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, sigpro, orden de pago');

        // set default header data
//        $pdf->SetHeaderData('rimisp_logo.png', '', '', '');


        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('Helvetica', '', 14, '', true);
        $pdf->setPrintHeader(false);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        $html = $this->getPartial('pdfODP',array('ODP' => $ordenDePago));
//        die($html);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $docName = 'orden_de_pago_'.$ordenDePago->getIdOrdenPago().'.pdf';
        ob_end_clean();
        $pdf->Output($docName, 'D');

        // Stop symfony process
        throw new sfStopException();

//        $pdf->SetCreator(PDF_CREATOR);
//        $pdf->SetAuthor('SIGPRO');
//        $pdf->SetTitle('ORDEN DE PAGO');
//        $pdf->SetHeaderData('rimisp-logo_270_180.png', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);
//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);
//        $pdf->SetMargins(20, 20, 20, false);
//        $pdf->SetAutoPageBreak(true, 20);
//        $pdf->SetFont('Helvetica', '', 10);
//
//        $pdf->addPage();
//        $html = $this->getPartial('pdfODP',array('ODP' => $ordenDePago));
////        die($html);
//        $pdf->writeHTML($html, true, 0, true, 0);
//        $pdf->lastPage();
//
//        $docName = 'orden_de_pago_'.$ordenDePago->getIdOrdenPago().'.pdf';
//        $pdf->output($docName, 'I');
//        ob_end_clean();
//        $pdf->Output($docName, 'I');
//
//        throw new sfStopException();
//        return sfView::NONE;
    }
}
