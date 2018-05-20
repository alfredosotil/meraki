<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'short_description')->textarea(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'description')->textarea(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'thumbnail')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'type_nutrition')->textInput(['DIET', 'FITNESS', 'MUSCLE', 'VEGAN']) ?>

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'stock')->textInput() ?>

    <?php echo $form->field($model, 'is_active')->checkbox() ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
