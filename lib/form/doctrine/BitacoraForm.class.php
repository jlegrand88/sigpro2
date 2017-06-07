<?php

/**
 * Bitacora form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BitacoraForm extends BaseBitacoraForm
{
    public function configure()
    {
        $this->setWidget('id_proyecto',new sfWidgetFormInputHidden());
        $this->setWidget('id_usuario',new sfWidgetFormInputHidden());
        $this->setWidget('fecha_creacion',new sfWidgetFormInputHidden());
        $this->setWidget('observacion',new sfWidgetFormTextarea( array(), array( 'class' => 'form-control input-sm', 'max_length' => 500, 'maxlength' => 500,'rows' => "3", 'cols' => "170",'required' => "true" ) ));

        $this->setValidator('id_accion', new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Accion'),'required' => false)));
    }
}
