<?php

class izarusWidgetFormBootstrapDatetime extends sfWidgetFormInputText {
  /**
   * Configures the widget
   *
   * Options:
   *
   *  * type:     string    all     Set type of datepicker. Support Type:
   *                                      all       contains date & time picker
   *                                      time      time picker only
   *                                      date      date picker only
   *                                      month     month picker only
   *                                      year      year picker only
   *
   *  * to:         element   null    Attr of Slider Button. Set target element value when slider button moves. (Suggest setting to <input> element)
   *  * autoclose:  boolean   false   Enable close picker automatically when user selected the year/month/date in yearpicker, monthpicker and datepicker
   *  * container:  string    false   Appends the tooltip to a specific element. Example: container: 'body'
   *  * before:     date      null    Set picker enable date before the before. Example: before: '1990-09-03'
   *  * after:      date      null    Set picker enable date after the after. Example: after: '1989-11-28'
   *  * format:     string    null    Set format for picker display. Example: format: 'dd/MM/yyyy' will convert to 03/09/1990
   *                                      yyyy year
   *                                      MM month
   *                                      dd date
   *                                      HH hours
   *                                      mm minutes
   *                                      ss second
   *
   * @param  array  $options
   * @param  array  $attributes
   */
  protected function configure($options = array(), $attributes = array()){
    $this->addOption('type','all');
    $this->addOption('to',null);
    $this->addOption('autoclose',false);
    $this->addOption('container',false);
    $this->addOption('before',null);
    $this->addOption('after',null);
    $this->addOption('format',null);
  }

  /**
   * Renders the widget
   * @param  string $name
   * @param  string $value
   * @param  array  $attributes
   * @param  array  $errors
   */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
//        $input = new sfWidgetFormInputText();
        $attributes['id']= $this->generateId($name);
        $attributes['data-toggle']='datepicker';
        $attributes['data-type']=$this->getOption('type');
        $attributes['data-to']=$this->getOption('to');
        $attributes['data-autoclose']=$this->getOption('autoclose');
        $attributes['data-container']=$this->getOption('container');
        $attributes['data-before']=$this->getOption('before');
        $attributes['data-after']=$this->getOption('after');
        $attributes['data-format']=$this->getOption('format'); 

//        if($name == "proyecto[fecha_inicio]")
//        {
//            die($value);
//        }
        if(preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/',$value))
        {
            if($value == '0000-00-00')
            {
                $formattedDate = null;
            }
            else{
                $date = new DateTime($value);
                $formattedDate = $date->format("d-m-Y");
            }
        }
        else
        {
            $formattedDate = $value;
        }
        return $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $formattedDate), $attributes));
    }

    public function renderTag($tag, $attributes = array())
    {
        if (empty($tag))
        {
            return '';
        }
        $widget = "<div class='input-group date' id='dtp_'>";
        $widget .= sprintf('<%s%s%s', $tag, $this->attributesToHtml($attributes), self::$xhtml ? ' />' : (strtolower($tag) == 'input' ? '>' : sprintf('></%s>', $tag)));
        $widget .= "<span class='input-group-addon'>";
        $widget .= "<span class='glyphicon glyphicon-calendar'></span>";
        $widget .= "</span>";
        $widget .= "</div>";
        return $widget;
    }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavaScripts()
  {
    return array(
      '/izarusBootstrapPlugin/js/bootstrap-components.js',
      );
  }

  /**
   * Gets the Stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheets paths
   */
  public function getStyleSheets()
  {
    return array(
      '/izarusBootstrapPlugin/css/bootstrap-components.css' => 'all'
      );
  }
}