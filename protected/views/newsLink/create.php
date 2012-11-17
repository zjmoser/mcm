<?php
/* @var $this NewsLinkController */
/* @var $model NewsLink */

$this->breadcrumbs=array(
	'News Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NewsLink', 'url'=>array('index')),
	array('label'=>'Manage NewsLink', 'url'=>array('admin')),
);
?>

<h1>Create NewsLink</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>