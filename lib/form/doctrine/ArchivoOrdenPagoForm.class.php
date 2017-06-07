<?php

/**
 * ArchivoOrdenPago form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArchivoOrdenPagoForm extends BaseArchivoOrdenPagoForm
{
    public function configure()
    {
//        $this->widgetSchema["archivo"] = new sfWidgetFormInputFile();
//        $this->validatorSchema['archivo'] = new sfValidatorFile(array('required'=>$varRequired, 'path' => $ruta, 'mime_types' => $mimes, 'max_size' => $tamano),array('required'=>'Debe adjuntar Curriculum Vitae'));
        $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getOrdenPago()->getIdProyecto(), $this->getObject()->getIdOrdenPago()), sfConfig::get('ruta_documentos_orden_pago'));
        $this->setWidgets(array(
            'archivo' => new sfWidgetFormInputFile(array(),array('accept' => 'application/pdf'))
        ));


        $this->setValidators(array(
            'archivo' => new sfValidatorFile(array('required' => false, 'path' => $ruta, 'mime_types' => array('application/pdf')))
        ));
        $this->getValidator('archivo')->setOption('mime_type_guessers', array(array($this->validatorSchema['archivo'], 'guessFromFileBinary')));

//        if(!$this->getObject()->isNew())
//        {
////            $archivoOrdenPago = $this->getObject();
////            $src = $archivoOrdenPago->getRuta().DIRECTORY_SEPARATOR.$archivoOrdenPago->getArchivo();
////            $this->setWidget('archivo', new sfWidgetFormInputFileEditable(
////                array(
////                        'file_src'=>$src,
////                        'delete_label' => 'Eliminar',
////                        'edit_mode' => true,
////                        'with_delete' => false,
////                        'template' => "<div class='row'>
////                                            <div class='col-sm-12'>
////                                                <div style='color: green'><b>".$archivoOrdenPago->getNombre()."</b></div> %delete% %delete_label% %input%
////                                            </div>
////                                        </div>"
////                ),
////                array('accept' => 'application/pdf')
////            ));
////            $this->setValidator('archivo_delete',new sfValidatorString());
//            $this->setWidget('id_archivo_orden_pago', new sfWidgetFormInputHidden());
//            $this->setValidator('id_archivo_orden_pago', new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_archivo_orden_pago')), 'empty_value' => $this->getObject()->get('id_archivo_orden_pago'), 'required' => false)));
//        }

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'validacionesExtras'))));
    }

    public function validacionesExtras($validator, $values)
    {
        $errores = array();
        if ($values['archivo'] instanceof sfValidatedFile)
        {
            $archivo = $values['archivo'];
            if ($archivo->getType() == 'application/pdf')
            {
                $fileAnalisis = $archivo->getTempName();
                $nombreArchivo = $archivo->getOriginalName();

                $respuestas = RevisionArchivo::encriptadoYCorrupto($fileAnalisis,false);
                $error = '';
                if ($respuestas)
                {
                    foreach ($respuestas as $mns_error)
                    {
                        $error = new sfValidatorError($validator, $mns_error);
                    }
                }

                $errorValidaNombre = RevisionArchivo::validaNombreArchivoCaracteresEspeciales($nombreArchivo);
                if($errorValidaNombre != '')
                {
                    $error = new sfValidatorError($validator, $errorValidaNombre);
                }

                if ($error)
                {
                    $errores['archivo'] = $error;
                }
            }
        }
        if (count($errores) > 0)
        {
            throw new sfValidatorErrorSchema($validator, $errores);
        }
        return $values;
    }

    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
        if(isset($values['archivo']))
        {
            $archivo = $values['archivo'];
            $nombreArchivo = $archivo->getOriginalName();
            $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getOrdenPago()->getIdProyecto(), $this->getObject()->getIdOrdenPago()), sfConfig::get('ruta_documentos_orden_pago'));
            $object->setRuta($ruta);
            $object->setFechaUpload(date('Y-m-d'));
            $object->setNombre($nombreArchivo);
        }

        return $object;
    }
}
