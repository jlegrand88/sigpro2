<?php

/**
 * Proyecto form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProyectoForm extends BaseProyectoForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'id_proyecto'           => new sfWidgetFormInputHidden(),
            'id_pais'               => new sfWidgetFormDoctrineChoice( array( 'label' => 'Administra:', 'model' => $this->getRelatedModelName('Pais'), 'add_empty' => false ) ),
            'fecha_creacion'        => new sfWidgetFormInputHidden(),
            'id_creador'            => new sfWidgetFormInputHidden(),
            'titulo'                => new sfWidgetFormTextarea( array( 'label' => 'Titulo del Proyecto:'), array( 'max_length' => 255, 'maxlength' => 255 ) ),
            'titulo_ing'            => new sfWidgetFormTextarea( array( 'label' => 'Titulo del Proyecto en Ingles:' ), array( 'max_length' => 255, 'maxlength' => 255 ) ),
//            'id_responsable_proy'   => new sfWidgetFormDoctrineChoice( array( 'label'=>'Responsable del Proyecto:', 'model' => $this->getRelatedModelName( 'ResponsableProyecto' ), 'add_empty' => true ) ),
            'id_responsable_proy'   => new sfWidgetFormInputHidden(),
            'numero_contrato'       => new sfWidgetFormInputText(),
            'numero_contable'       => new sfWidgetFormInputText( array ('label' => 'Numero Contable:' ) ),
            'nombre_contrato'       => new sfWidgetFormInputText( array( 'label' => 'Nombre Contrato:' ) ),
//            'id_responsable_cont'   => new sfWidgetFormDoctrineChoice( array( 'model' => $this->getRelatedModelName('ResponsableCont'), 'add_empty' => true ) ),
            'id_responsable_cont'   => new sfWidgetFormInputHidden(),
            'fecha_firma_contrato'  => new izarusWidgetFormBootstrapDatetime( array( 'type' => 'all','format' => 'dd-MM-yyyy',  'label' => 'Fecha Firma Contrato:' ) ),
            'sigla_contable'        => new sfWidgetFormInputText( array( 'label' => 'Sigla Contabilidad:' ) ),
            'nombre_proyecto_resum' => new sfWidgetFormInputText( array( 'label' => 'Nombre Proyecto Contable (resumido):' ) ),
            'donante'               => new sfWidgetFormInputText( array( 'label' => 'Donante (contraparte):' ) ),
            'contraparte'           => new sfWidgetFormInputText( array( 'label'=>'Persona de Contacto Contraparte:' ) ),
            'correo_contraparte'    => new sfWidgetFormInputText( array( 'label'=>'Correo:' ) ),
            'duracion_proyecto'     => new sfWidgetFormInputHidden(),
            'fecha_inicio'          => new izarusWidgetFormBootstrapDatetime( array( 'type' => 'all','format' => 'dd-MM-yyyy', 'label' => 'Fecha Inicio:' ) ),
            'fecha_termino'         => new izarusWidgetFormBootstrapDatetime( array( 'type' => 'all','format' => 'dd-MM-yyyy', 'label' => 'Fecha Termino:' ) ),
            'fecha_avance_inf'      => new izarusWidgetFormBootstrapDatetime( array( 'type' => 'all','format' => 'dd-MM-yyyy', 'label' => 'Fecha Informe Tecnico:' ) ),
            'fecha_fin_inf'         => new izarusWidgetFormBootstrapDatetime( array( 'type' => 'all','format' => 'dd-MM-yyyy', 'label' => 'Fecha Informe Financiero:' ) ),
            'id_moneda'             => new sfWidgetFormDoctrineChoice(array('label' => 'Moneda:', 'model' => $this->getRelatedModelName('Moneda'), 'add_empty' => true)),
            'overhead_autorizado'   => new sfWidgetFormInputText( array( 'label' => 'Porcentaje Overhead Autorizado por Donante:' ) ),
            'monto_total'           => new sfWidgetFormInputText( array( 'label' => 'Monto Total:' ) ),
            'monto_pago_remesa'     => new sfWidgetFormInputText( array( 'label' => '' ) ),
            'fecha_pago_remesa'     => new sfWidgetFormDate( array( 'label' => '' ) ),
            'descr_proyecto'        => new sfWidgetFormTextarea( array( 'label' => 'Descripcion Proyecto:' ), array( 'max_length' => 2000, 'maxlength' => 2000 ) ),
            'descr_proyecto_ing'    => new sfWidgetFormTextarea( array( 'label' => 'Descripcion Proyecto Ingles:' ), array( 'max_length' => 2000, 'maxlength' => 2000 ) ),
            'objetivo'              => new sfWidgetFormTextarea( array( 'label' => 'Objetivo:' ), array( 'max_length' => 2000, 'maxlength' => 2000 ) ),
//            'id_estado_proyecto'    => new sfWidgetFormDoctrineChoice( array ('model' => $this->getRelatedModelName('EstadoProyecto'), 'add_empty' => true ) ),
            'id_estado_proyecto'    => new sfWidgetFormInputHidden(),
            'folio'                 => new sfWidgetFormInputHidden(),
            'id_grupo_proyecto'     => new sfWidgetFormDoctrineChoice( array( 'label' => 'Grupo:', 'model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => true ) ),
            'id_pais_ejecuta'       => new sfWidgetFormDoctrineChoice(array('label' => 'Ejecuta:', 'model' => $this->getRelatedModelName('PaisEjecuta'), 'add_empty' => true)),
            'recupera_costo'        => new sfWidgetFormInputText( array( 'label' => 'Recuperacion de Costo:' ) ),
            'frases_claves'         => new sfWidgetFormTextarea( array( 'label' => 'Palabras Claves:' ), array( 'max_length' => 255, 'maxlength' => 255 )),
            'id_tipo_control_tec'   => new sfWidgetFormDoctrineChoice(array('label' => 'Tipo de Control Tecnico:', 'model' => $this->getRelatedModelName('TipoControlTec'), 'add_empty' => true)),
            'id_tipo_control_fin'   => new sfWidgetFormDoctrineChoice(array('label' => 'Tipo de Control Financiero:', 'model' => $this->getRelatedModelName('TipoControlFin'), 'add_empty' => true)),
            'usuarios_proyecto_grupo_list' => new sfWidgetFormDoctrineChoice(array('label' => 'Responsable del Proyecto:', 'multiple' => true, 'model' => 'Usuario')),
        ));

        $this->setValidators(array(
            'id_proyecto'           => new sfValidatorInteger(array('required' => false)),
            'id_pais'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'))),
            'fecha_creacion'        => new sfValidatorDate(array('required' => false)),
            'id_creador'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creador'))),
            'titulo'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'titulo_ing'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'id_responsable_proy'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableProyecto'), 'required' => false)),
            'numero_contrato'       => new sfValidatorInteger(array('required' => false)),
            'numero_contable'       => new sfValidatorInteger(),
            'nombre_contrato'       => new sfValidatorString(array('max_length' => 45)),
            'id_responsable_cont'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ResponsableCont'), 'required' => false)),
            'fecha_firma_contrato'  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
            'sigla_contable'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'nombre_proyecto_resum' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'donante'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'contraparte'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'correo_contraparte'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'duracion_proyecto'     => new sfValidatorInteger(array('required' => false)),
            'fecha_inicio'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
            'fecha_termino'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
            'fecha_avance_inf'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
            'fecha_fin_inf'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
            'id_moneda'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Moneda'), 'required' => false)),
            'overhead_autorizado'   => new sfValidatorNumber(array('required' => false)),
            'monto_total'           => new sfValidatorNumber(array('required' => false)),
            'monto_pago_remesa'     => new sfValidatorInteger(array('required' => false)),
            'fecha_pago_remesa'     => new sfValidatorDate(array('required' => false)),
            'descr_proyecto'        => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
            'descr_proyecto_ing'    => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
            'objetivo'              => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
            'id_estado_proyecto'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoProyecto'), 'required' => false)),
            'folio'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
            'id_grupo_proyecto'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'required' => false)),
            'id_pais_ejecuta'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaisEjecuta'), 'required' => false)),
            'recupera_costo'        => new sfValidatorNumber(array('required' => false)),
            'frases_claves'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'id_tipo_control_tec'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlTec'), 'required' => false)),
            'id_tipo_control_fin'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoControlFin'), 'required' => false)),
            'usuarios_proyecto_grupo_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Usuario', 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('proyecto[%s]');
    }

    public function save($conn = null)
    {
        if (is_null($conn))
        {
            $conn = $this->getConnection();
        }

        $conn->beginTransaction();

        try
        {
            $values = $this->getValue('usuarios_proyecto_grupo_list');
            unset($this->values['usuarios_proyecto_grupo_list']);
            $this->values['fecha_firma_contrato'] = DateTime::createFromFormat('d-m-Y',$this->getValue('fecha_firma_contrato'))->format('Y-m-d');
            $this->values['fecha_inicio'] = DateTime::createFromFormat('d-m-Y',$this->getValue('fecha_inicio'))->format('Y-m-d');
            $this->values['fecha_termino'] = DateTime::createFromFormat('d-m-Y', $this->getValue('fecha_termino'))->format('Y-m-d');
            $this->values['fecha_avance_inf'] = DateTime::createFromFormat('d-m-Y', $this->getValue('fecha_avance_inf'))->format('Y-m-d');
            $this->values['fecha_fin_inf'] = DateTime::createFromFormat('d-m-Y', $this->getValue('fecha_fin_inf'))->format('Y-m-d');
            $proyecto = parent::save($conn);
            $proyecto->ProyectoGrupo->delete();

            if (!is_array($values))
            {
                $values = array();
            }
            foreach ($values as $value)
            {
                $proyectoGrupo = new ProyectoGrupo();
                $proyectoGrupo->setIdProyecto($this->getObject()->getIdProyecto());
                $proyectoGrupo->setIdGrupoProyecto($this->getValue('id_grupo_proyecto'));
                $proyectoGrupo->setIdUsuario($value);
                $proyectoGrupo->save($conn);
            }
            $conn->commit();
            return $proyecto;
        }
        catch (Doctrine_Exception $e)
        {
            $conn->rollback();
            throw new sfError404Exception($e);
            return null;
        }
    }

    public function getModelName()
    {
        return 'Proyecto';
    }
}
