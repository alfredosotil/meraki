<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detail */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Detail',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detail-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
