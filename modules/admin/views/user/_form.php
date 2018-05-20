<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>

    <?php echo $form->field($model, 'phone_number')->textInput(['maxlength' => 45]) ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

    <?php // echo $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'birthday')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'history_id')->textInput() ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php // echo $form->field($model, 'last_login')->textInput() ?>

    <?php // echo $form->field($model, 'total_points')->textInput() ?>

    <?php // echo $form->field($model, 'deleted_at')->textInput()   ?>

    <?php // echo $form->field($model, 'deleted_by')->textInput() ?>

    <?php // echo $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
