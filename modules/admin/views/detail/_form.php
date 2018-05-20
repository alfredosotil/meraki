<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'product_id')->textInput() ?>

    <?php echo $form->field($model, 'order_id')->textInput() ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'description')->textarea(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'qty')->textInput() ?>

    <?php echo $form->field($model, 'price_per_unit')->textInput() ?>

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'tax')->textInput() ?>

    <?php echo $form->field($model, 'vat')->textInput() ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
