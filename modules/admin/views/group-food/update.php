<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupFood */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Group Food',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Foods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-food-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
