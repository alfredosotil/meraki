<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GroupFood */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group Food',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Foods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-food-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
