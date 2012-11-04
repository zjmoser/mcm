<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="page">

	<div id="header">
        <div class="container">
            <div id="logo">
                <?php
                $imghtml = CHtml::image('/css/title.png', 'Moser Capital Management');
                echo CHtml::link($imghtml, array('/site/index'))
                ?>
            </div>
            <div id="accnt-box">
                <?php #if(Yii::app()->user->isGuest) $this->widget('LoginBox'); ?>
            </div>
            <div id="mainmenu">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array(
                            'label'=>'HOME',
                            'url'  =>array('/site/index'),
                        ),
                        array(
                            'label'=>'ABOUT',
                            'url'  =>array('/site/page',
                            'view' =>'about')
                        ),
                        array(
                            'label'=>'INVEST',
                            'url'=>array('/site/invest')
                        ),
                        array(
                            'label'=>'ENTREPRENEUR',
                            'url'=>array('/site/entrepreneur')
                        ),
                        array(
                            'label'=>'CONTACT',
                            'url'=>array('/site/contact')
                        ),
                        array(
                            'label'=>'DISCLAIMER',
                            'url'=>array('/site/page',
                            'view'=>'disclaimer')
                        ),
                        array(
                            'label'=>'LOGIN',
                            'url'=>array('/site/login'),
                            'visible'=>Yii::app()->user->isGuest
                        ),
                        array(
                            'label'=>'Logout ('.Yii::app()->user->name.')',
                            'url'=>array('/site/logout'),
                            'visible'=>!Yii::app()->user->isGuest
                        )
                    ),
                    'itemCssClass'=>'nav-option',
                )); ?>
            </div><!-- mainmenu -->
        </div><!-- container -->
	</div><!-- header -->



    <div id="main" class="container">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
            All Rights Reserved.<br/>
            <?php echo Yii::powered(); ?>
        </div><!-- footer -->
    </div>

</div><!-- page -->

</body>
</html>
