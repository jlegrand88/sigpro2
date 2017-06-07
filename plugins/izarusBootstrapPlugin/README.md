izarusBootstrapPlugin
=====================

Plugin Symfony 1.4 con widgets, helpers, generadores y estilos de Bootstrap 3.

## Helpers
### BootstrapHelper

```php
<?php use_helper('Bootstrap') ?>
```
#### Funciones

---

##### `bs_btn_link($text, $url, $type='default', $size=null, $attributes=array())`
Devuelve el HTML de un link `<a href="">` con estilo botón.

**parámetro** | **tipo** | **valor predeterminado** | descripción
--- | --- | --- | ---
text | string | | Texto del botón
url | string | | Url para el botón (se puede usar ```url_for()```)
type | string | default | (opcional) Tipo del botón para estilo: `default, primary, success, info, danger, warning`
size | string |  | (opcional) Tamaño del botón distinto al estándar: `sm, xs, lg`
attributes | array |  | (opcional) Atributos HTML adicionales

Ejemplo:

```php
<?php echo bs_btn_link('Login', url_for('usuario/login'), 'primary', 'ls') ?>
```

---

#### `bs_alert($text, $type='info', $dismiss=false)`
Devuelve el HTML de un cuadro de alerta.

**parámetro** | **tipo** | **valor predeterminado** | descripción
--- | --- | --- | ---
text | string | | Texto de la alerta
type | string | info | (opcional) Tipo de alerta para estilo: `success, info, danger, warning`
dismiss | boolean | false | (opcional) Si se muestra el botón para cerrar (ocultar) la alerta

Ejemplo:

```php
<?php echo bs_alert('Operación exitosa','success',true) ?>
```

---

#### `bs_breadcrumb($sites=array(), $home_url='')`
Devuelve el HTML de breadcrumbs.

**parámetro** | **tipo** | **valor predeterminado** | descripción
--- | --- | --- | ---
sites | array | | Lista de links: `array('Primer item'=>url_for('@primer_item', 'Segundo item'=>url_for('@segundo_item'), ...))`
home_url | string | | (opcional) Link de la página principal. Por defecto usará el resultado de `url_for(@homepage)`

Ejemplo:

```php
<?php echo bs_breadcrumb(array(
  'Products' => url_for('products/list'),
  'Main Category' => url_for('products/category?cat=1'),
  'Item 4656'  => url_for('products/view?id=4656'),
)) ?>
```

```html
<ol class="breadcrumb">
 <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
 <li><a href="/products">Products</a></li>
 <li><a href="/products/category/1">Main Category</a></li>
 <li><a href="/products/4656">Item 4656</a></li>
</ol>
```


## Widgets
### izarusWidgetFormBootstrapDatetime
```php
$this->widgetSchema['created_at'] = new izarusWidgetFormBootstrapDatetime(<options>);
```

Options:

* type:     string    all     Set type of datepicker.
  Support Type:
  * 'all'       contains date & time picker
  * 'time'      time picker only
  * 'date'      date picker only
  * 'month'     month picker only
  * 'year'      year picker only
* to:   element   null    Attr of Slider Button.
  Set target element value when slider button moves. (Suggest setting to <input> element)
* autoclose:  boolean   false   Enable close picker automatically when user
  selected the year/month/date in yearpicker, monthpicker and datepicker
* container:  string    false   Appends the tooltip to a specific element. Example: container: 'body'
* before:     date      null    Set picker enable date before the before. Example: before: '1990-09-03'
* after:      date      null    Set picker enable date after the after. Example: after: '1989-11-28'
* format:     string    null    Set format for picker display. Example: format: 'dd/MM/yyyy' will convert to 03/09/1990
  * yyyy year
  * MM month
  * dd date
  * HH hours
  * mm minutes
  * ss second