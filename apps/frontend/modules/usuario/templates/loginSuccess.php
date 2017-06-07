<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<body xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<!--    <title>SIGPRO - RIMISP 1.2</title>-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SIGPRO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" action="<?php echo url_for("@user_login"); ?>" method="post">
                <div class="form-group">
                    <?php echo $form['email']->render(array('class' => 'form-control','placeholder' =>'Usuario','required' => 'true')); ?>
                </div>
                <div class="form-group">
                    <?php
                        echo $form['password']->render(array('class' => 'form-control','placeholder' =>'Password', 'required' => 'true'));
                        echo $form->renderHiddenFields();
                    ?>
                </div>
                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
        </div>
    </div>
    <?php if($sf_user->getFlash("error")): ?>
        <div class="alert alert-danger">
            <strong><?php echo $sf_user->getFlash("error"); ?></strong>
        </div>
    <?php endif; ?>
</nav>

<div class="jumbotron">
    <div class="container">
        <h2>Sistema de Seguimiento de Proyectos </h2>
        <p>Bienvenidos al Sistema de Seguimiento de los proyectos de RIMISP </p>
    </div>
</div>

<div class="container">
    <div class="row"></div>
    <hr>
    <footer>
        <p>&copy; RIMISP 2016 v1.2 26082016</p>
    </footer>
</div>
</body>
</html>

