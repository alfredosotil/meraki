<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'uuid')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'is_alergic')->checkbox() ?>

    <?php echo $form->field($model, 'type_nutrition')->dropDownList(['DIET', 'FITNESS', 'MUSCLE', 'VEGAN']) ?>

    <?php echo $form->field($model, 'description')->textarea(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'indications')->textarea(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'created_at')->textInput(['maxlength' => 255]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
