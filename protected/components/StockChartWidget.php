<?php

class StockChartWidget extends CWidget{

    public $ticker   = '^GSPC';
    public $options  = null;
    public $style    = 'minimal';

    public $title = 's&p 500';

    public function init(){
        parent::init();
    }

    public function run() {
        $cache = Yii::app()->cache;
        $cache->flush();
        $data  = $cache->get($this->ticker);

        if($data==false)
        {
        $query = <<<EOS
SELECT * FROM (
    SELECT m.date_recorded, m.close_price
    FROM market_daily m
    WHERE m.ticker="{$this->ticker}"
    ORDER BY m.date_recorded DESC
    LIMIT 30
) AS n
ORDER BY n.date_recorded
EOS;

            $tickerData = MarketDaily::model()->findAllBySql($query);
            $data = array('series'=>array());
            $max_price = -99999.0;
            $min_price = 99999.0;
            $i=0;
            foreach ($tickerData as $dailyDataItem) {
                $dt = new DateTime($dailyDataItem->date_recorded);
                $price = (float) $dailyDataItem->close_price;
                $data['series'][] = array($i++, $price);

                if ($price < $min_price) $min_price = $price;
                if ($price > $max_price) $max_price = $price;
            }

            $data['min'] = $min_price;
            $data['max'] = $max_price;

            $cache->set($this->ticker, $data, 3600);
        }

        if(is_null($this->options))
            // Use predefined template based on style variable
            $this->options = $this->{'style_'.$this->style};

        $range = $data['max'] - $data['min'];
        $space = $range/10;

        $this->options['axes']['yaxis'] = array(
            'min'=>$data['min'] - $space,
            'max'=>$data['max'] + $space,
        );

        $this->options['canvasOverlay'] = array(
            'show'=>true,
            'objects'=>array(array(
                'dashedHorizontalLine'=>array(
                    'name'     =>'zero',
                    'y'        =>$data['series'][0][1],
                    'lineWidth'=>1,
                    'color'    =>'#999999',
                    'shadow'   =>false,
                    'xOffset'  =>'0',
                    'dashPattern'=>array(5, 5),
                ),
            )),
        );

        $id=$this->getId();
        echo CHtml::openTag('div', array('id'=>$id, 'class'=>'graph-box'));
        echo CHtml::openTag('div', array('class'=>'graph-title-box'));
        echo "<h5>{$this->title}</h5>";
        echo "<h6>1 MONTH</h6>";
        echo CHtml::closeTag('div');

        $this->widget('JqplotGraphWidget',
            array(
                'data'=>array($data['series']),
                'options'=>$this->options,
            )
        );
        echo CHtml::closeTag('div');
    }

    public $style_minimal = array(
        'seriesColors'=>array('#162D50'),
        'axesDefaults'=>array(
            'showTicks'=>false,
            'show'=>false,
        ),
        'axes'=>array(
            'xaxis'=>array(
                'min'=>0,
                'max'=>33,
            ),
            'yaxis'=>array(
            ),
        ),
        'seriesDefaults'=>array(
            'showMarker'=>false,
            'fillColor' =>'#4287F0',
            'rendererOptions'=>array(
                'smooth'=>true,
                'animation'=>array(
                    'show'=>true,
                ),
            ),
        ),
        'grid'=>array(
            'drawGridlines'  =>false,
            'backgroundColor'=>'#ffffff',
            'borderColor'    =>'#999999',
            'borderWidth'    =>0,
            'shadow'         =>false,
        ),
    );
}
