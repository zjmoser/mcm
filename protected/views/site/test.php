<?php
/* @var $this SiteController
   $data string
*/

$this->pageTitle=Yii::app()->name;
?>

<h1>Yahoo!</h1>

        <?php
        $jqData = $data;
        array_shift($jqData);
        /*$this->widget('JqplotGraphWidget',
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
                    'style'=>'width:700px;height:400px;'
                ),
                'pluginScriptFile'=>array(
                    'jqplot.dateAxisRenderer.js',
                    'jqplot.ohlcRenderer.js',
                ),
            )
        );*/
        ?>


<table>
    <tr>
<?php
        list($keys, $headers) = each($data);
        foreach ($headers as $var) {
?>
        <th><?php echo $var ?></th>
<?php
        }
?>
    </tr>

<?php while (list($keys, $values) = each($data)) { ?>
    <tr>
    <?php foreach ($values as $val) { ?>
        <td><?php echo $val ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>
