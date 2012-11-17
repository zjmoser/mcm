<?php
/* @var $this NewsLinkController */
/* @var $model NewsLink */

$this->breadcrumbs=array(
	'News Links'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List NewsLink', 'url'=>array('index')),
	array('label'=>'Create NewsLink', 'url'=>array('create')),
	array('label'=>'Update NewsLink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsLink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsLink', 'url'=>array('admin')),
);
?>

<h1>View NewsLink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time_saved',
		'title',
		'description',
		'link_url',
		'img_url',
	),
)); ?>
