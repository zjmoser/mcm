<?php
/* @var $this NewsLinkController */
/* @var $model NewsLink */

$this->breadcrumbs=array(
	'News Links'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NewsLink', 'url'=>array('index')),
	array('label'=>'Create NewsLink', 'url'=>array('create')),
	array('label'=>'View NewsLink', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NewsLink', 'url'=>array('admin')),
);
?>

<h1>Update NewsLink <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>