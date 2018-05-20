<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeIngredient */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Type Ingredient',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-ingredient-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
