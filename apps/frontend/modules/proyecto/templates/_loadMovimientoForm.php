<?php if ($sf_user->hasFlash('error')): ?>
    <div class="alert alert-danger col-lg-12">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php
            echo $sf_user->getFlash('error')."</br>";
        ?>
    </div>
<?php endif ?>

<?php if ($form->hasGlobalErrors()): ?>
    <div class="alert alert-danger col-lg-12">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $form->renderGlobalErrors(); ?>
    </div>
<?php endif ?>

<?php if ($sf_user->hasFlash('success')): ?>
    <div class="alert alert-success col-lg-12">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $sf_user->getFlash('success'); ?>
    </div>
<?php endif ?>

<?php echo $form->renderHiddenFields(); ?>
<div class="row" id="presupuesto_cuenta_overhead_group">
    <div class="col-sm-12">
        <?php echo $form['cuenta_overhead']->renderRow(); ?>
    </div>
</div>

<div class="row" id="presupuesto_tiene_overhead_group">
    <div class="col-sm-12">
        <?php echo $form['tiene_overhead']->renderRow(); ?>
    </div>
</div>

<div class="row" id="presupuesto_tipo_movimiento_group">
    <div class="col-sm-12">
        <?php echo $form['id_tipo_movimiento']->renderRow(array('class' => 'form-control input-sm select2','required' => 'true')); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php echo $form['cuenta']->renderRow(array('class' => 'form-control input-sm','required' => 'true')); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php echo $form['nombre_cuenta']->renderRow(array('class' => 'form-control input-sm','required' => 'true')); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php echo $form['periodo']->renderRow(array('class' => 'form-control input-sm','required' => 'true')); ?>
    </div>
</div>

<div class="row" id="presupuesto_enero_group">
    <div class="col-sm-12">
        <?php echo $form['enero']->renderRow(array('class' => 'form-control input-sm', 'type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_febrero_group">
    <div class="col-sm-12">
        <?php echo $form['febrero']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_marzo_group">
    <div class="col-sm-12">
        <?php echo $form['marzo']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>

<div class="row" id="presupuesto_abril_group">
    <div class="col-sm-12">
        <?php echo $form['abril']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_mayo_group">
    <div class="col-sm-12">
        <?php echo $form['mayo']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_junio_group">
    <div class="col-sm-12">
        <?php echo $form['junio']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_julio_group">
    <div class="col-sm-12">
        <?php echo $form['julio']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_agosto_group">
    <div class="col-sm-12">
        <?php echo $form['agosto']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_septiembre_group">
    <div class="col-sm-12">
        <?php echo $form['septiembre']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_octubre_group">
    <div class="col-sm-12">
        <?php echo $form['octubre']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_noviembre_group">
    <div class="col-sm-12">
        <?php echo $form['noviembre']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>
<div class="row" id="presupuesto_diciembre_group">
    <div class="col-sm-12">
        <?php echo $form['diciembre']->renderRow(array('class' => 'form-control input-sm','type' => 'number')); ?>
    </div>
</div>

</br>
</br>
<script>
    $().ready(function () {
        esOverhead($('#presupuesto_cuenta_overhead'));
        tieneOverhead($('#presupuesto_tiene_overhead'));
    })
    $('#presupuesto_id_tipo_movimiento').select2({
        placeholder: "Seleccione"
    });

    //funcion readonly select2
    function readonly_select(objs, action) {
        if (action===true)
            objs.prepend('<div class="disabled-select"></div>');
        else
            $(".disabled-select", objs).remove();
    }

    function esOverhead(elem)
    {
        if(elem.is(':checked'))
        {
            $('#presupuesto_cuenta_overhead').val(1);
            $('#presupuesto_tiene_overhead').val(0);
            readonly_select($("#select2-presupuesto_id_tipo_movimiento-container").closest('.select2'), true);
            $('#presupuesto_id_tipo_movimiento').val(2).trigger('change');
            $('#presupuesto_tiene_overhead_group').hide();
        }
        else {
            $('#presupuesto_cuenta_overhead').val(0);
            readonly_select($("#select2-presupuesto_id_tipo_movimiento-container").closest('.select2'), false);
            $('#presupuesto_tipo_movimiento_group').show();
            $('#presupuesto_tiene_overhead_group').show();
        }
        if($('#presupuesto_id_presupuesto').val())
        {
            ocultarMeses(false);
        }else{
            ocultarMeses(true);
        }
    }

    function tieneOverhead(elem) {
        if(elem.is(':checked'))
        {
            $('#presupuesto_tiene_overhead').val(1);
            $('#presupuesto_cuenta_overhead').val(0);
            $('#presupuesto_cuenta_overhead_group').hide();
        }
        else {
            $('#presupuesto_tiene_overhead').val(0);
            $('#presupuesto_cuenta_overhead_group').show();
        }
    }
    //varifico si es cta overhead
    $('#presupuesto_cuenta_overhead').click(function (event) {
        esOverhead($('#presupuesto_cuenta_overhead'));
    });

    // verifico si tiene overhead
    $('#presupuesto_tiene_overhead').click(function (event) {
        tieneOverhead($('#presupuesto_tiene_overhead'));
    });

    function ocultarMeses(flag) {
        if(flag) {
            $('#presupuesto_enero').val("");
            $('#presupuesto_enero_group').hide();

            $('#presupuesto_febrero').val("");
            $('#presupuesto_febrero_group').hide();

            $('#presupuesto_marzo').val("");
            $('#presupuesto_marzo_group').hide();

            $('#presupuesto_abril').val("");
            $('#presupuesto_abril_group').hide();

            $('#presupuesto_mayo').val("");
            $('#presupuesto_mayo_group').hide();

            $('#presupuesto_junio').val("");
            $('#presupuesto_junio_group').hide();

            $('#presupuesto_julio').val("");
            $('#presupuesto_julio_group').hide();

            $('#presupuesto_agosto').val("");
            $('#presupuesto_agosto_group').hide();

            $('#presupuesto_septiembre').val("");
            $('#presupuesto_septiembre_group').hide();

            $('#presupuesto_octubre').val("");
            $('#presupuesto_octubre_group').hide();

            $('#presupuesto_noviembre').val("");
            $('#presupuesto_noviembre_group').hide();

            $('#presupuesto_diciembre').val("");
            $('#presupuesto_diciembre_group').hide();
        }
        else {
            $('#presupuesto_enero_group').show();
            $('#presupuesto_febrero_group').show();
            $('#presupuesto_marzo_group').show();
            $('#presupuesto_abril_group').show();
            $('#presupuesto_mayo_group').show();
            $('#presupuesto_junio_group').show();
            $('#presupuesto_julio_group').show();
            $('#presupuesto_agosto_group').show();
            $('#presupuesto_septiembre_group').show();
            $('#presupuesto_octubre_group').show();
            $('#presupuesto_noviembre_group').show();
            $('#presupuesto_diciembre_group').show();
        }
    }
</script>
