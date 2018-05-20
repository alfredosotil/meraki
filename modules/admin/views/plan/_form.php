<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'duration')->textInput() ?>

    <?php echo $form->field($model, 'points_per_week')->textInput() ?>

    <?php echo $form->field($model, 'points_per_month')->textInput() ?>

    <?php echo $form->field($model, 'lunch_per_week')->textInput() ?>

    <?php echo $form->field($model, 'lunch_per_month')->textInput() ?>

    <?php echo $form->field($model, 'snack_per_week')->textInput() ?>

    <?php echo $form->field($model, 'snack_per_month')->textInput() ?>

    <?php echo $form->field($model, 'price_per_week')->textInput() ?>

    <?php echo $form->field($model, 'price_per_month')->textInput() ?>

    <?php echo $form->field($model, 'is_active')->textInput() ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
