<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Plans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create {modelClass}', [
            'modelClass' => 'Plan',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(['enablePushState' => false, 'timeout' => 3000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            'id',
//            'uuid',
            'created_at:datetime',
            'updated_at:datetime',
            'duration',
            'price_per_week',
            'price_per_month',
            'points_per_week',
            'points_per_month',
            'lunch_per_week',
            'lunch_per_month',
            'snack_per_week',
            'snack_per_month',
            'is_active',
            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]);
    ?>
    <?php \yii\widgets\Pjax::end(); ?>

</div>
