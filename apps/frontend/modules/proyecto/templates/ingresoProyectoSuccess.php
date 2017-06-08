<?php use_helper('Date'); ?>
<ul class="nav nav-tabs col-lg-12" id="nav-tabs-ficha">
    <li class="active"><a href="#fichaProyecto" data-toggle="tab">Ficha de Proyectos</a></li>
    <?php $disabled = ($permiso) ? "" : "disabled";?>
    <li class="<?php echo $disabled;?>"><a href="#presupuesto" data-toggle="tab" >Ingreso de Cuentas</a></li>
    <li class="<?php echo $disabled;?>"><a href="#despachar" data-toggle="tab" >Despachar</a></li>
</ul>
<div class="tab-content col-lg-12">
    <?php
        $varAlerta = isset($alerta) ? $alerta : "";
        $varAlertaSuccess = (isset($alertaSuccess)) ? $alertaSuccess : "";
        include_partial('proyecto/fichaProyecto',array('form' => $form, 'permiso' => $permiso, 'permisosUsuario' => $permisosUsuario, 'editable' => $editable, 'alerta' => $varAlerta, 'alertaSuccess' => $varAlertaSuccess));
        include_partial('proyecto/presupuesto',array('proyecto' => $proyecto, 'editable' => $editable, 'accionUsuario' => $accionUsuario, 'movimientos' => $movimientos));
        include_partial('proyecto/despachar',array('proyecto' => $proyecto, 'accionUsuario' => $accionUsuario, 'accionUsuarioPregunta' => $accionUsuarioPregunta,
            'accionEstadoFinal' => $accionEstadoFinal, 'listaUsuarios' => $listaUsuarios, 'idInbox' => $idInbox,'tipoDocumento' => $tipoDocumento));
        include_partial('proyecto/formBitacora');
    ?>
</div>
<script type="text/javascript">
    $().ready(function () 
    {
        var editable = <?php echo $editable; ?>;
        if (!editable)
        {
            $('input').prop('readonly', true);
            $('textarea').prop('readonly', true);
            $('select').prop('readonly', true);
            $('button').attr("disabled", true);
            $('.select2').prop("disabled", true);
        }
    });
</script>
