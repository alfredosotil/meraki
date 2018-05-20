<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'History',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
