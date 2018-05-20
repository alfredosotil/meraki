<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductHasSizes */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Product Has Sizes',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Has Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-has-sizes-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
