<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProductHasSizes;
use app\models\ProductHasSizesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductHasSizesController implements the CRUD actions for ProductHasSizes model.
 */
class ProductHasSizesController extends Controller
{
   /**
    * Behaviors
    * @return array
    */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductHasSizes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductHasSizesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ProductHasSizes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductHasSizes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Product Has Sizes has been created.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing ProductHasSizes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $sizes_id
     * @return mixed
     */
    public function actionUpdate($product_id, $sizes_id)
    {
        $model = $this->findModel($product_id, $sizes_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Product Has Sizes has been saved.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing ProductHasSizes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $sizes_id
     * @return mixed
     */
    public function actionDelete($product_id, $sizes_id)
    {
        $this->findModel($product_id, $sizes_id)->delete();
        Yii::$app->session->setFlash('success', 'Product Has Sizes has been deleted.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductHasSizes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $sizes_id
     * @return ProductHasSizes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $sizes_id)
    {
        if (($model = ProductHasSizes::findOne(['product_id' => $product_id, 'sizes_id' => $sizes_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
