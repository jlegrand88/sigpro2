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
//        $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getOrdenPago()->getIdProyecto(), $this->getObject()->getIdOrdenPago()), sfConfig::get('ruta_documentos_orden_pago'));
        $this->setWidgets(array(
            'archivo' => new sfWidgetFormInputFile(array(),array('accept' => 'application/pdf'))
        ));


        $this->setValidators(array(
            'archivo' => new sfValidatorFile(array('required' => false,'path' => sfConfig::get('app_ruta_documentos_orden_pago'), 'mime_types' => array('application/pdf')))
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

        $this->widgetSchema->setNameFormat('archivo_orden_pago[%s]');
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
//        $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getOrdenPago()->getIdProyecto(), $this->getObject()->getOrdenPago()->getIdOrdenPago()), sfConfig::get('app_ruta_documentos_orden_pago'));
//        $this->getValidator('archivo')->setOption('path',$ruta);
//        die($ruta);
        if(isset($values['archivo']))
        {
            $rutaBase = sfConfig::get('app_ruta_documentos_orden_pago');
            $archivo = $values['archivo'];
//            die(var_dump($archivo));
            $nombreArchivo = $archivo->getOriginalName();
            $object->setRuta($archivo->getSavedName());
            $object->setFechaUpload(date('Y-m-d'));
            $object->setNombre($nombreArchivo);
        }

        return $object;
    }

//
//    protected function processUploadedFile($field, $filename = null, $values = null)
//    {
//        if (!$this->validatorSchema[$field] instanceof sfValidatorFile)
//        {
//            throw new LogicException(sprintf('You cannot save the current file for field "%s" as the field is not a file.', $field));
//        }
//
//        if (null === $values)
//        {
//            $values = $this->values;
//        }
//
//        if (isset($values[$field.'_delete']) && $values[$field.'_delete'])
//        {
//            $this->removeFile($field);
//
//            return '';
//        }
//
//        if (!$values[$field])
//        {
//            // this is needed if the form is embedded, in which case
//            // the parent form has already changed the value of the field
//            $oldValues = $this->getObject()->getModified(true, false);
//
//            return isset($oldValues[$field]) ? $oldValues[$field] : $this->object->$field;
//        }
//        $idOP = $this->getObject()->getOrdenPago()->getIdOrdenPago();
//        $ruta = preg_replace(array("/@proyecto/", "/@ordenPago/"), array($this->getObject()->getOrdenPago()->getIdProyecto(), $idOP), sfConfig::get('app_ruta_documentos_orden_pago'));
//        $this->validatorSchema[$field]->setOption('path',$ruta);
//        echo $this->validatorSchema[$field]->getOption('path');
//        // we need the base directory
//        if (!$this->validatorSchema[$field]->getOption('path'))
//        {
//            return $values[$field];
//        }
//
//        $this->removeFile($field);
//
//        return $this->saveFile($field, $filename, $values[$field]);
//    }
}
