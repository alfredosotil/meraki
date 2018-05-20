<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Subscription',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
