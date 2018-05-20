<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sizes */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Sizes',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizes-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
