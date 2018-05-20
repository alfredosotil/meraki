<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detail */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Detail',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
