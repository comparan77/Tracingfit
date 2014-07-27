<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="header">
	<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array(
				"class"=>"menu"
			),
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->checkAccess("super")),
				array('label'=>'Nosotros', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>!Yii::app()->user->checkAccess("super")),
				array('label'=>'Contacto', 'url'=>array('/site/contact'), 'visible'=>!Yii::app()->user->checkAccess("super")),
				array('label'=>'Entrenador', 'url'=>array('/entrenador'), 'visible'=>Yii::app()->user->checkAccess("super")),
				array('label'=>'Alumnos', 'url'=>array('/alumno'), 'visible'=>Yii::app()->user->checkAccess("super")),
				array('label'=>'Asistencia', 'url'=>array('/asistencia'), 'visible'=>Yii::app()->user->checkAccess("super")),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Tracingfit.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
