<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ingredients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'group_food_id')->textInput() ?>

    <?php echo $form->field($model, 'type_ingredient_id')->textInput() ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'description')->textarea(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'protein_per_gram')->textInput() ?>

    <?php echo $form->field($model, 'color')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
