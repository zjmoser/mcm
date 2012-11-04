<?php

/**
 * LoginBox is a Widget containing a log in form.
 */
class LoginBox extends CWidget
{
    public function init()
    {
        $this->publishAssets();
    }

    public function run()
    {
        $model = Yii::app()->session['model'];

        // If no stored model, create a new one.
        if (!isset($model))
            $model = new LoginForm;
        else
            unset(Yii::app()->session['model']);

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];

			if($model->validate() && $model->login())
                unset(Yii::app()->session['username']);
            else
                Yii::app()->session['model'] = $model;

            $this->controller->refresh();

		}

		// display the login form
		$this->render('loginBox',array('model'=>$model));
    }

    protected function publishAssets()
    {
        $am = Yii::app()->getAssetManager();
        $assetDir = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
        $assetUrl = $am->publish($assetDir);

        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($assetUrl.DIRECTORY_SEPARATOR.'loginBox.css');
    }
}
