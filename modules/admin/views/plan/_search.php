<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'uuid') ?>

    <?php echo $form->field($model, 'created_at') ?>

    <?php echo $form->field($model, 'updated_at') ?>

    <?php echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'price_per_week') ?>

    <?php // echo $form->field($model, 'price_per_month') ?>

    <?php // echo $form->field($model, 'points_per_week') ?>

    <?php // echo $form->field($model, 'points_per_month') ?>

    <?php // echo $form->field($model, 'lunch_per_week') ?>

    <?php // echo $form->field($model, 'lunch_per_month') ?>

    <?php // echo $form->field($model, 'snack_per_week') ?>

    <?php // echo $form->field($model, 'snack_per_month') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
