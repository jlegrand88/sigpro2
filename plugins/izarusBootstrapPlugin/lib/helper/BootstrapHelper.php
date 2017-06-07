<?php

/**
 * Returns HTML with a link using Bootstrap button style
 * @param  string $text       Text for the button
 * @param  string $url        URL
 * @param  string $type       Button type: default, primary, success, info, danger, warning (OPTIONAL)
 * @param  string $size       Button size: sm, xs, lg (OPTIONAL)
 * @param  array  $attributes HTML attributes (OPTIONAL)
 * @return string
 */
function bs_btn_link($text, $url, $type='default', $size=null, $attributes=array())
{
  $classes = '';
  $attributes_str = '';
  if (isset($attributes['class'])){
    $classes .= $attributes['class'];
    unset($attributes['class']);
  }
  foreach ($attributes as $key => $value) {
    $attributes_str .= ' '.$key.'="'.$value.'"';
  }
  $template = '<a class="btn btn-%s %s" href="%s" %s>%s</a>';
  return sprintf(
    $template,
    $type,
    ($size)? 'btn-'.$size.' '.$classes:$classes,
    $url,
    $attributes_str,
    $text
    );
}


/**
 * Returns HTML with alert dismissable
 * @param  string  $text    Alert text content
 * @param  string  $type    Alert type: success, info, danger, warning
 * @param  boolean $dismiss Shows the close button
 * @return string
 */
function bs_alert($text, $type='info', $dismiss=false)
{
  $template = '<div class="alert alert-%s %s" role="alert">%s %s</div>';
  $dismiss_str = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  return sprintf(
    $template,
    $type,
    ($dismiss)?'alert-dismissible':'',
    ($dismiss)?$dismiss_str:'',
    $text
    );
}


/**
 * Returns HTML for breadcrumbs starting with home icon.
 *
 * First parameter is the list of site>url of each breadcrumb item.
 * Usage example:
 *
 *   <?php echo bs_breadcrumb(array(
 *     'Products' => url_for('products/list'),
 *     'Main Category' => url_for('products/category?cat=1'),
 *     'Item 4656'  => url_for('products/view?id=4656'),
 *   )) ?>
 *
 *   It will echo:
 *
 *   <ol class="breadcrumb">
 *    <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
 *    <li><a href="/products">Products</a></li>
 *    <li><a href="/products/category/1">Main Category</a></li>
 *    <li><a href="/products/4656">Item 4656</a></li>
 *   </ol>
 *
 *
 * @param  array  $sites    Associative array of sites with text: array('text'=>'url',...)
 * @param  string $home_url Link to homepage, default is url_for('@homepage')
 * @return string
 */
function bs_breadcrumb($sites = array(), $home_url = '') {
  $template = '
<ol class="breadcrumb">
  <li><a href="%s"><i class="glyphicon glyphicon-home"></i></a></li>
  %s
</ol>
';

  if (is_array($sites)) {

    $home_url = ($home_url)? $home_url : url_for('@homepage');
    $items = '';
    foreach ($sites as $txt => $url) {
      $items .= '<li><a href="'.$url.'">'.$txt.'</a></li>';
    }

    return sprintf(
      $template,
      $home_url,
      $items
      );

  } else return false;

}

