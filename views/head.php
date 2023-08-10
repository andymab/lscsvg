  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=isset($this->model->title) ? $this->model->title : SITE ?></title>

    <!-- Bootstrap core CSS -->

	<link type="text/css"  href="<?=URL?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=URL?>public/css/modern-business.css" rel="stylesheet">
	<link href="<?=URL?>public/css/style.css" rel="stylesheet">
	<?php if(isset($this->model->css)):?>
	<?php foreach($this->model->css as $src): ?>
	<link href="<?=URL.$src?>" rel="stylesheet">
	<?php endforeach ?>
	<?php endif;?>
	<link href="<?=URL?>public/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?=URL?>public/vendor/jquery/jquery.min.js"></script>
  </head>