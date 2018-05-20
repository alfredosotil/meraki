<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'plan_id')->textInput() ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'subscription_state_id')->textInput() ?>

    <?php echo $form->field($model, 'starts_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'ends_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'lunches_delivered')->textInput() ?>

    <?php echo $form->field($model, 'snacks_delivered')->textInput() ?>

    <?php // echo $form->field($model, 'created_by')->textInput() ?>

    <?php // echo $form->field($model, 'updated_by')->textInput() ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
