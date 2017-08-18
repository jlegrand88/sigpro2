<?php

/**
 * Proveedor filter form.
 *
 * @package    sigpro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorFormFilter extends BaseProveedorFormFilter
{

    public function configure()
    {
        $this->setWidgets(array(
            'rut_proveedor' => new sfWidgetFormFilterInput(),
            'razon_social'  => new sfWidgetFormFilterInput(),
            'telefono'      => new sfWidgetFormFilterInput(),
            'email'         => new sfWidgetFormFilterInput(),
        ));

        $this->setValidators(array(
            'rut_proveedor' => new sfValidatorPass(array('required' => false)),
            'razon_social'  => new sfValidatorPass(array('required' => false)),
            'telefono'      => new sfValidatorPass(array('required' => false)),
            'email'         => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('proveedor_filters[%s]');
    }

    public function getFields()
    {
        return array(
            'id_proveedor'  => 'Number',
            'rut_proveedor' => 'text',
            'razon_social'  => 'Text',
            'telefono'      => 'Text',
            'email'         => 'Text',
        );
    }
}
