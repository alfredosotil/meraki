<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ingredients */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Ingredients',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
