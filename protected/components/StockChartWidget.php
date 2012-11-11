<?php

class StockChartWidget extends CWidget{

    public $ticker   = '^GSPC';
    public $fromDate = array(1,1,2012);
    public $toDate   = array(31,12,2012);
    public $number   = 30;
    public $options  = null;
    public $style    = 'minimal';

    public $title = null;

    public function init(){
        parent::init();
    }

    public function run() {
        $cache = Yii::app()->cache;
        $data  = $cache->get($this->ticker);
        if($data==false)
        {
            $yf = Yii::app()->yahoofinance;
            $yf->setTicker($this->ticker);
            $yf->setFromDate($this->fromDate[0], $this->fromDate[1], $this->fromDate[2]);
            $yf->setToDate($this->toDate[0], $this->toDate[1], $this->toDate[2]);
            $data = $yf->closeData;

            $cache->set($this->ticker, $data, 3600);
        }

        // Slice off headers and select the predefined number of data pieces
        $data = array_slice($data, 1, $this->number);

        // Sort the data in chronological order
        $plotData = array();
        for($i=0; $i<$this->number; $i++)
            $plotData[] = array($i, (float)$data[$this->number-($i+1)]);

        if(is_null($this->options))
            // Use predefined template based on style variable
            $this->options = $this->{'style_'.$this->style};

        if(isset($this->title))
           $this->options['title'] = $this->title;

        $id=$this->getId();
        echo CHtml::openTag('div', array('id'=>$id, 'style'=>'width:250px;margin:0 auto;'));
        $this->widget('JqplotGraphWidget',
            array(
                'data'=>array($plotData),
                'options'=>$this->options,
                'htmlOptions'=>array(
                    'style'=>'width:250px;height:200px;'
                ),
            )
        );
        echo CHtml::closeTag('div');

$scriptString = <<<EOT
mytitle = \$('<div class="my-jqplot-title" style="position:absolute;padding: 15px;width:100%;font-size:16px;">S&P 500</div>').insertAfter('#$id .jqplot-grid-canvas');
EOT;

        Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id, $scriptString);
    }

    public $style_minimal = array(
        'seriesColors'=>array('#162D50'),
        'title'=>array(
            #'text'=>'Hello',
            #'textColor' =>'#4d4d4d',
            #'fontFamily'=>'Eras Medium ITC, Arial, Helvetica, sans-serif',
            #'fontSize'  =>'32px',
            #'textAlign' =>'center',
        ),
        'axesDefaults'=>array(
            'showTicks'=>false,
            'tickOptions'=>array(
                #'showLabel'=>true,
                #'showMark'=>false,
            ),
            'rendererOptions'=>array(
                'baselineWidth'=>2,
                'baselineColor'=>'#999999',
                'drawBaseline'=>false,
            ),
        ),
        'axes'=>array(
            'xaxis'=>array(
                'min'=>0,
                #'drawMajorGridlines' => false,
            ),
        ),
        'seriesDefaults'=>array(
            'yaxis'=>'y2axis',
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
            'borderWidth'    =>1,
            'shadow'         =>false,
        ),
    );

    public $style_one = array(
        'seriesColors'=>array('#162D50'),
        'title'=>array(
            #'text'=>'Hello',
            #'textColor' =>'#4d4d4d',
            #'fontFamily'=>'Eras Medium ITC, Arial, Helvetica, sans-serif',
            #'fontSize'  =>'32px',
            #'textAlign' =>'center',
        ),
        'axesDefaults'=>array(
            'showTicks'=>false,
            'tickOptions'=>array(
                #'showLabel'=>true,
                #'showMark'=>false,
            ),
            'rendererOptions'=>array(
                'baselineWidth'=>2,
                'baselineColor'=>'#999999',
                'drawBaseline'=>false,
            ),
        ),
        'axes'=>array(
            'xaxis'=>array(
                #'pad'=>1,
                #'drawMajorGridlines' => false,
            ),
        ),
        'seriesDefaults'=>array(
            'yaxis'=>'y2axis',
            'showMarker'=>false,
            'fillColor' =>'#4287F0',
            'rendererOptions'=>array(
                'smooth'=>true,
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

    public $style_two = array(
        'seriesColors'=>array('#162D50'),
        'title'=>array(
            #'text'=>'Hello',
            #'textColor' =>'#4d4d4d',
            #'fontFamily'=>'Eras Medium ITC, Arial, Helvetica, sans-serif',
            #'fontSize'  =>'32px',
            #'textAlign' =>'center',
        ),
        'axesDefaults'=>array(
            'showTicks'=>false,
            'tickOptions'=>array(
                #'showLabel'=>true,
                #'showMark'=>false,
            ),
            'rendererOptions'=>array(
                'baselineWidth'=>2,
                'baselineColor'=>'#999999',
                'drawBaseline'=>false,
            ),
        ),
        'axes'=>array(
            'xaxis'=>array(
                #'min'=>-0.5,
                #'drawMajorGridlines' => false,
            ),
        ),
        'seriesDefaults'=>array(
            'yaxis'=>'y2axis',
            'showMarker'=>false,
            'fillColor' =>'#4287F0',
            'rendererOptions'=>array(
                'smooth'=>true,
            ),
        ),
        'grid'=>array(
            'drawGridlines'  =>false,
            'backgroundColor'=>'#ffffff',
            'borderColor'    =>'#999999',
            'borderWidth'    =>1,
            'shadow'         =>false,
        ),
    );

}
