<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductHasIngredients */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Has Ingredients',
]) . ' ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Has Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-has-ingredients-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
