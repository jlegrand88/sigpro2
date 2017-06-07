<?php

/**
 * usuario actions.
 *
 * @package    sigpro
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeLogin(sfWebRequest $request)
    {
        $this->form = new LoginForm();
        if($request->isMethod("post"))
        {
            $this->form->bind($request->getParameter("login"));
            if ($this->form->isValid()) 
            {
                if (!$user = UsuarioTable::login($this->form->getValue("email"), $this->form->getValue("password")))
                {
                    // No hemos conseguido loguear al usuario
                    // Redirigimos de nuevo al login con un mensaje de error
                    $this->getUser()->setFlash("error", "datos incorrectos");
                    $this->redirect("@user_login");
                }
                else
                {
                    // Logueamos
                    $this->getUser()->setAuthenticated(true);
                    $this->getUser()->setAttribute("id", $user->getIdUsuario());
                    $this->getUser()->setAttribute("nombreCompleto", $user->getNombreCompleto());
                    $this->getUser()->setAttribute("correo", $user->getCorreo());
                    // Comprobamos si tiene referer, si no, le llevamos a la homepage
                    $url = $this->getUser()->getAttribute("referer", false) ?: "@bandeja_entrada";
                    $this->getUser()->setAttribute("referer", false);
                    $this->redirect($url);
                }
            }
        }
    }

    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->getAttributeHolder()->clear();
        $this->redirect("@homepage");
    }

    public function executeBandejaEntrada(sfWebRequest $request)
    {
        $usuario = UsuarioTable::getInstance()->findOneByIdUsuario($this->getUser()->getAttribute('id'));
        $listadoInbox = $usuario->getInbox();
        $data = array();

        if(isset($listadoInbox))
        {
            foreach($listadoInbox as $itemListado)
            {
                $item['idInbox'] = $itemListado->getIdInbox();
                $item['folio'] = $itemListado->getFolio();
                $item['idTipoDocumento'] = $itemListado->getIdTipoDocumento();
                $item['emisor'] = $itemListado->getEmisor()->getNombreCompleto();

                $proyecto = $itemListado->getProyecto();
                $item['idProyecto'] = $proyecto->getIdProyecto();
                $item['nombreProyecto'] = $proyecto->getTitulo();
                $item['numeroContable'] = $proyecto->getNumeroContable();
                $item['estadoProyecto'] = $proyecto->getEstadoProyecto()->getDescripcion();

                $item['fechaRecepcion'] = $itemListado->getFechaRecepcion();
                
                $item['lastBitacora'] = BitacoraTable::getInstance()->getLastBitacoraProyecto($proyecto->getIdProyecto());
                
                $items[] = $item;
            }
        }
        $data['inbox'] = isset($items)?$items:null;
        $data['countInbox'] = isset($items)?count($items):0;
        $this->data = $data;
    }

    public function executeBandejaSalida(sfWebRequest $request)
    {
        $usuario = UsuarioTable::getInstance()->findOneByIdUsuario($this->getUser()->getAttribute('id'));
        $listadoOutbox = $usuario->getOutbox();
        $data = array();

        if(isset($listadoOutbox))
        {
            foreach ($listadoOutbox as $itemListado)
            {
                $item['idInbox'] = $itemListado->getIdInbox();
                $proyecto = $itemListado->getProyecto();
                $item['idProyecto'] = $proyecto->getIdProyecto();
                $item['destinatario'] = $itemListado->getDestinatario()->getNombreCompleto();
                $item['nombreProyecto'] = $proyecto->getTitulo();
                $item['fechaDespacho'] = $itemListado->getFechaDespacho();
                $item['estadoProyecto'] = $proyecto->getEstadoProyecto()->getDescripcion();
                $items[] = $item;
            }
            $data['outbox'] = isset($items)?$items:null;
            $data['countOutbox'] = isset($items)?count($items):0;

        }
        $this->data = $data;
    }

    public function executeAccionesUsuario(sfWebRequest $request)
    {
        header('Content-Type: application/json');

        $acciones = UsuarioTable::getListaAcciones($request->getParameter('id_destinatario'));
        print_r( json_encode ( $acciones ) );
        exit;
    }
}
