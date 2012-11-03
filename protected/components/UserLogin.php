<?php

/**
 * UserLogin is a Widget containing a log in form.
 */
class UserLogin extends CWidget
{
    #public $title='Login';

    public function init()
    {
    }

    public function run()
    {
        $model = new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
            Yii::app()->session['username'] = $model->username;

			if($model->validate() && $model->login())
                unset(Yii::app()->session['username']);

            $this->controller->refresh();
		}

        $model->username = Yii::app()->session['username'];

		// display the login form
		$this->render('userLogin',array('model'=>$model));
    }
}
