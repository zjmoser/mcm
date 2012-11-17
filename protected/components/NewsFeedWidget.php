<?php

class NewsFeedWidget extends CWidget{

    public $listLength = 3;

    public function init() {
        parent::init();
    }

    public function run() {
        $newsLinks = NewsLink::model()->findAllBySql("SELECT * FROM news_link ORDER BY id DESC LIMIT :limit", array(':limit'=>$this->listLength));

        echo '<div id="newsfeed">';
        foreach ($newsLinks as $newsElmt) {
            $newsData = array(
                'title'=>$newsElmt->title,
                'description'=>$newsElmt->description,
                'url'=>$newsElmt->link_url,
                'img'=>$newsElmt->img_url,
            );

            $this->render('newsElement', $newsData);

        }
        echo '</div>';
    }

}

?>
