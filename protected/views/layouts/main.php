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
                        'label'=>'EDUCATE',
                        'url'=>array('/site/educate')
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
                        'label'=>'LOGOUT ('.Yii::app()->user->name.')',
                        'url'=>array('/site/logout'),
                        'visible'=>!Yii::app()->user->isGuest
                    )
                ),
                'itemCssClass'=>'nav-option',
            )); ?>
        </div><!-- mainmenu -->
	</div><!-- header -->



    <div id="main">
        <div id="mission-statement">
            <p>Moser Capital Management is a newly founded organisation dedicated to educating society about the benefits and risks of gaining exposure to financial markets. Our services include private equity management, entrepreneur partnership and financial education.</p>
        </div>

        <?php echo $content; ?>

        <div id="sidebar">
        <?php /*
        $this->widget('JqplotGraphWidget',
            array(
                'data'=>array($jqData),
                'options'=>array(
                    'seriesDefaults'=>array('yaxis'=>'y2axis'),
                    'axes'=>array(
                        'xaxis'=>array(
                            'renderer'=>'js:$.jqplot.DateAxisRenderer',
                            'tickOptions'=>array('formatString'=>'%b %e'),
                            'tickInterval'=> '1 week',
                        ),
                        'y2axis'=>array(
                            'tickOptions'=>array('formatString'=>'$%d'),
                            'min'=>1200,
                            'max'=>1400,
                        ),
                    ),
                    'series'=>array(
                        array('renderer'=>'js:$.jqplot.OHLCRenderer'),
                    ),
                    'title'=>'S&P 500',
                ),
                'htmlOptions'=>array(
                    'style'=>'width:200px; height:200px;'
                ),
                'pluginScriptFile'=>array(
                ),
            )
        );
        */?>
        </div>

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
