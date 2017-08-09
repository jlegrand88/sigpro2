<?php

/**
 * ProyectoGrupo form.
 *
 * @package    sigpro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProyectoGrupoBackendForm extends BaseProyectoGrupoForm
{
    public function configure()
    {
        $choices = UsuarioTable::getInstance()->getAllUsers();

        $this->setWidgets(array(
            'id_proyecto'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'), 'add_empty' => false)),
            'id_grupo_proyecto' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'), 'add_empty' => false)),
            'id_usuario'        => new sfWidgetFormChoice(array('choices' => $choices, 'multiple' => true)),
        ));

        $this->setValidators(array(
            'id_proyecto'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proyecto'))),
            'id_grupo_proyecto' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GrupoProyecto'))),
            'id_usuario'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('proyecto_grupo[%s]');
    }
    
    public function setDefaults($defaults)
    {
        parent::setDefaults($defaults);

        $usuarios = $this->getObject()->getProyecto()->getUsuariosProyectoGrupo();
        $usuariosDefault = array();
        foreach ($usuarios as $usuario)
        {
            $usuariosDefault[] = $usuario->getIdUsuario();
        }
        $this->setDefault('id_usuario',$usuariosDefault);

        return $this;
    }

  /*  public function doSave($con = null)
    {
        if (null === $con)
        {
            $con = $this->getConnection();
        }

        $this->updateObject();

        $usuarios = $this->getValue('id_usuario');
        foreach ($usuarios as $usuario)
        {
            $this->getObject()->setIdUsuario($usuario);
            $this->getObject()->save();
        }

        $this->saveEmbeddedForms($con);
    }*/
    

}
