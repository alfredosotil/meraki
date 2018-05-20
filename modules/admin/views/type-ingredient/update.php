<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeIngredient */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Type Ingredient',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="type-ingredient-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
