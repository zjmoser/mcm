<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="shortcut icon" href="<?php Yii::app()->request->baseUrl; ?>/favico.ico" type="image/x-icon" />
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
            $imghtml = CHtml::image('/images/title.png', 'Moser Capital Management');
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
                        'url'  =>array('/site/about',),
                        #'view' =>'about')
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
                    #array(
                    #    'label'=>'LOGIN',
                    #    'url'=>array('/site/login'),
                    #    'visible'=>Yii::app()->user->isGuest
                    #),
                    #array(
                    #    'label'=>'LOGOUT ('.Yii::app()->user->name.')',
                    #    'url'=>array('/site/logout'),
                    #    'visible'=>!Yii::app()->user->isGuest
                    #)
                ),
                'itemCssClass'=>'nav-option',
            )); ?>
        </div><!-- mainmenu -->
	</div><!-- header -->



    <div id="main">
        <div id="mission-statement">
            <p class="quiet">At Moser Capital Management we are dedicated to educating society about the benefits and risks involved in gaining exposure to financial markets. Our services include private equity management, entrepreneur partnership and financial education.</p>
        </div>

        <div id="banner-box">
            <?php echo $this->clips['banner']; ?>
        </div>

        <?php echo $content; ?>

        <div id="sidebar">
            <div id="recent-news">
                <h2>RECENT NEWS</h2>
                    <?php $this->widget('NewsFeedWidget', array('listLength'=>3)); ?>
            </div>
            <hr class="break"/>
            <div id="market-status">
                <h2>MARKET STATUS</h2>
                    <?php $this->widget('StockChartWidget', array('ticker'=>'^NZ50', 'title'=>'NZX 50')); ?>
                    <?php $this->widget('StockChartWidget', array('ticker'=>'^AXJO', 'title'=>'ASX 200')); ?>
                    <?php $this->widget('StockChartWidget', array('ticker'=>'^GSPC', 'title'=>'S&P 500')); ?>
            </div>
        </div>

        <div class="clear"></div>

        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by Moser Capital Management.<br/>
            All Rights Reserved.<br/>
        </div><!-- footer -->
    </div>

</div><!-- page -->

</body>
</html>
