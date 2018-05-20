<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'amount')->textInput() ?>

    <?php echo $form->field($model, 'shipping')->textInput() ?>

    <?php echo $form->field($model, 'tax')->textInput() ?>

    <?php echo $form->field($model, 'shipp_name')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'shipp_address')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'phone_number')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'departament')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'province')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'district')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'country')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'tracking_number')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'type_payment')->dropDownList(['CASH', 'TRANSFER']) ?>

    <?php echo $form->field($model, 'shipped')->checkbox() ?>

    <?php echo $form->field($model, 'is_paid')->checkbox() ?>

    <?php echo $form->field($model, 'is_active')->checkbox() ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'deleted_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'notes')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
