<?php
/* @var $this SiteController
   $data string
*/

$this->pageTitle=Yii::app()->name;
?>

<h1>Yahoo!</h1>

<?php
$jqData = $data;
$jqData = array_slice($data, 1, 30);

$plotData = array();
for($i=0; $i<30; $i++)
    $plotData[] = array($i, (float)$jqData[29-$i]);

$this->widget('JqplotGraphWidget',
    array(
        'data'=>array($plotData),
        'options'=>array(
            'seriesColors'=>array('#162D50'),
            'axesDefaults'=>array(
                'showTicks'=>false,
                'tickOptions'=>array(
                    #'showLabel'=>true,
                    #'showMark'=>false,
                ),
            ),
            'axes'=>array(
                'xaxis'=>array(
                    'min'=>0,
                ),
                'y2axis'=>array(
                ),
            ),
            'seriesDefaults'=>array(
                'yaxis'=>'y2axis',
                'showMarker'=>false,
                'rendererOptions'=>array(
                    'smooth'=>true,
                ),
            ),
            'series'=>array(
            ),
            'grid'=>array(
                'drawGridlines'=>false,
            ),
            'title'=>'S&P 500',
        ),
        'htmlOptions'=>array(
            'style'=>'width:200px;height:200px;'
        ),
        'pluginScriptFile'=>array(
        ),
    )
);
?>

