<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductHasIngredients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-has-ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'product_id')->textInput() ?>

    <?php echo $form->field($model, 'ingredients_id')->textInput() ?>

    <?php echo $form->field($model, 'grams_per_ingredient')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
