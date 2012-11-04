<?php

/**
 * UserLogin is a Widget containing a log in form.
 */
class UserLogin extends CWidget
{
    public function init()
    {
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
            Yii::app()->session['username'] = $model->username;

			if($model->validate() && $model->login())
                unset(Yii::app()->session['username']);
            else
                Yii::app()->session['model'] = $model;

            $this->controller->refresh();

		}

        $model->username = Yii::app()->session['username'];

		// display the login form
		$this->render('userLogin',array('model'=>$model));
    }
}
