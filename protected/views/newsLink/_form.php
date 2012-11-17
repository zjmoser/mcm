<?php
/* @var $this NewsLinkController */
/* @var $model NewsLink */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-link-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row success">
        <fieldset>
            <label for="url-input">Autofill From Url</label>
            <input id="url-input" type="text">
            <button id="autofill-btn">Autofill</button>
            <label for="img-input">Link To Image</label>
            <input id="img-input" type="text">
            <button id="imgsave-btn">Save</button>
            <div id="img-display" class="right"></div>
        </fieldset>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_saved'); ?>
		<?php echo $form->textField($model,'time_saved'); ?>
		<?php echo $form->error($model,'time_saved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_url'); ?>
		<?php echo $form->textField($model,'link_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'link_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_url'); ?>
		<?php echo $form->textField($model,'img_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'img_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    function getUrlInfo() {
        var urlToProcess = $("#url-input").val();
        var imgUrl = $("#img-input").val();
        $.post(
            '/index.php/newsLink/ajaxUrlProcess',
            { url: urlToProcess, imgUrl: imgUrl },
            function(data) {
                fillForm(data);
            },
            "json"
        );
    }

    function saveImage() {
        var imgUrl = $("#img-input").val();
        $.post(
            '/index.php/newsLink/saveImage',
            { url: imgUrl },
            function(html) {
                $("#img-display").html(html);
            },
            "html"
        );
    }

    function fillForm(data) {
        $("#NewsLink_time_saved").val(data.time_saved);
        $("#NewsLink_title").val(data.title);
        $("#NewsLink_description").val(data.description);
        $("#NewsLink_link_url").val(data.link_url);
        $("#NewsLink_img_url").val(data.img_url);
    }

    $("#autofill-btn").click(function() {
        getUrlInfo();
        return false;
    });

    $("#url-input").keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            getUrlInfo();
            return false;
        }
    });

    $("#imgsave-btn").click(function() {
        saveImage();
        return false;
    });

    $("#img-input").keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            saveImage();
            return false;
        }
    });
</script>
