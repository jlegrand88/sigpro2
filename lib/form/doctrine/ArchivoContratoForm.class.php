<?php

/**
 * ArchivoContrato form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArchivoContratoForm extends BaseArchivoContratoForm
{
    public function configure()
    {
        $idProyecto = $this->getObject()->getIdProyecto();
        $rutaDestino = preg_replace("/@proyecto/", $idProyecto, sfConfig::get('app_ruta_archivos_contrato'));
        $this->setWidgets(array(
            'archivo' => new sfWidgetFormInputFile(array(),array('accept' => 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'))
        ));
        $maxSize = 1024 * 1024 * 20;
        $this->setValidators(array(
            'archivo' => new sfValidatorFile(array('required' => false,'max_size' => $maxSize, 'path' => $rutaDestino, 'mime_types' => array('application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document')))
        ));
        $this->validatorSchema['archivo']->setMessage('max_size', 'El archivo debe poseer un tamaño máximo de 20 mb.');
        $this->getValidator('archivo')->setOption('mime_type_guessers', array(array($this->validatorSchema['archivo'], 'guessFromFileBinary')));

        $this->widgetSchema->setNameFormat('archivo_contrato[%s]');
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
            $object->setRuta($archivo->getSavedName());
            $object->setFecha(date('Y-m-d H:i:s'));
            $object->setNombre($nombreArchivo);
        }
        return $object;
    }
}
