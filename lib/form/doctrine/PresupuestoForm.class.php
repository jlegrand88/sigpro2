<?php

/**
 * Presupuesto form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PresupuestoForm extends BasePresupuestoForm
{
    public function configure()
    {
        if(!$this->isNew())
        {
            $presupuesto = $this->getObject();
            $periodo = $presupuesto->getPeriodo();
            $fechaTermino = new DateTime($presupuesto->getProyecto()->getFechaTermino());
            $añoFechaTermino = $fechaTermino->format('Y');
            $mesFechaTermino = $fechaTermino->format('m');
            for($mes = 1; $mes <= 12; $mes++)
            {
                if($periodo == $añoFechaTermino && $mesFechaTermino < $mes)
                {
                    $disabled[$mes] = array('disabled' => true);
                }
                else{
                    $disabled[$mes] = array('disabled' => false);
                }
            }
        }else{
            for($mes = 1; $mes <= 12; $mes++)
            {
                $disabled[$mes] = array('disabled' => false);
            }
        }

      //widgets
        $this->widgetSchema['id_proyecto'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['periodo'] = new izarusWidgetFormBootstrapDatetime( array( 'type' => 'year','format' => 'yyyy', 'label' => 'Periodo' ) );
        $this->widgetSchema['tiene_overhead'] = new sfWidgetFormInputCheckbox(array('label' =>'¿Tiene Overhead?'));
        $this->widgetSchema['cuenta_overhead'] = new sfWidgetFormInputCheckbox(array('label' =>'Cuenta Overhead' ));
        $this->widgetSchema['cuenta'] = new sfWidgetFormInputText(array('label' => 'N° Cuenta'));
        $this->widgetSchema['enero'] = new sfWidgetFormInputText(array(),$disabled[1]);
        $this->widgetSchema['febrero'] = new sfWidgetFormInputText(array(),$disabled[2]);
        $this->widgetSchema['marzo'] = new sfWidgetFormInputText(array(),$disabled[3]);
        $this->widgetSchema['abril'] = new sfWidgetFormInputText(array(),$disabled[4]);
        $this->widgetSchema['mayo'] = new sfWidgetFormInputText(array(),$disabled[5]);
        $this->widgetSchema['junio'] = new sfWidgetFormInputText(array(),$disabled[6]);
        $this->widgetSchema['julio'] = new sfWidgetFormInputText(array(),$disabled[7]);
        $this->widgetSchema['agosto'] = new sfWidgetFormInputText(array(),$disabled[8]);
        $this->widgetSchema['septiembre'] = new sfWidgetFormInputText(array(),$disabled[9]);
        $this->widgetSchema['octubre'] = new sfWidgetFormInputText(array(),$disabled[10]);
        $this->widgetSchema['noviembre'] = new sfWidgetFormInputText(array(),$disabled[11]);
        $this->widgetSchema['diciembre'] = new sfWidgetFormInputText(array(),$disabled[12]);
        
        //validadores
        $this->validatorSchema['periodo'] = new sfValidatorString(array('max_length' => 10, 'required' => false));
        $this->validatorSchema['cuenta_overhead'] = new sfValidatorBoolean(array('required' => false));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'validacionesExtras'))));
    }
    
    public function validacionesExtras($validator, $values)
    {
        $error = array();
        $idProyecto = $values['id_proyecto'];
        if (array_key_exists('periodo', $values))
        {
            $proyecto = ProyectoTable::getInstance()->find($idProyecto);
            $fechaInicio = new DateTime($proyecto->getFechaInicio());
            $fechaTermino = new DateTime($proyecto->getFechaTermino());
            if ($values['periodo'] > $fechaTermino->format("Y") || $values['periodo'] < $fechaInicio->format("Y"))
            {
                $error['periodo'] = new sfValidatorError($validator, 'Debe ingresar un periodo dentro del rango de fecha inicio y fecha termino del proyecto');
            }
        }
        if (array_key_exists('cuenta', $values))
        {
            $idTipoMovimiento = $values['id_tipo_movimiento'];
            $periodo = $values['periodo'];
            $cuenta = $values['cuenta'];
            $idPresupuesto = ($this->isNew()) ? null : $values['id_presupuesto'];
            $cuentaRepetida = PresupuestoTable::getInstance()->cuentaRepetida($idProyecto,$idTipoMovimiento,$periodo,$cuenta,$idPresupuesto);
            if ($cuentaRepetida)
            {
                $error['cuenta'] = new sfValidatorError($validator, 'Cuenta Repetida.');
            }
        }
        if (count($error) > 0)
        {
            throw new sfValidatorErrorSchema($validator, $error);
        }
        return $values;
    }
}
