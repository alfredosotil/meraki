<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductHasIngredients */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Product Has Ingredients',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Has Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-has-ingredients-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
