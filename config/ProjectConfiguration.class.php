<?php

require_once dirname(__FILE__).'\..\lib\vendor\symfony\lib\autoload\sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins(array('sfDoctrinePlugin','izarusBootstrapPlugin','sfFormExtraPlugin'));
//    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfTCPDFPlugin');
    $this->enablePlugins('sfAdminThemejRollerPlugin');
  }
}
