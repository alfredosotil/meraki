<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProductHasIngredients;
use app\models\ProductHasIngredientsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductHasIngredientsController implements the CRUD actions for ProductHasIngredients model.
 */
class ProductHasIngredientsController extends Controller
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
     * Lists all ProductHasIngredients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductHasIngredientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ProductHasIngredients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductHasIngredients();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Product Has Ingredients has been created.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing ProductHasIngredients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $ingredients_id
     * @return mixed
     */
    public function actionUpdate($product_id, $ingredients_id)
    {
        $model = $this->findModel($product_id, $ingredients_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Product Has Ingredients has been saved.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing ProductHasIngredients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $ingredients_id
     * @return mixed
     */
    public function actionDelete($product_id, $ingredients_id)
    {
        $this->findModel($product_id, $ingredients_id)->delete();
        Yii::$app->session->setFlash('success', 'Product Has Ingredients has been deleted.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductHasIngredients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $ingredients_id
     * @return ProductHasIngredients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $ingredients_id)
    {
        if (($model = ProductHasIngredients::findOne(['product_id' => $product_id, 'ingredients_id' => $ingredients_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
