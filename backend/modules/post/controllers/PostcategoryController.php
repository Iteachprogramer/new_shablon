<?php

namespace backend\modules\post\controllers;

use backend\controllers\AsosController;
use Yii;
use backend\modules\post\models\Postcategory;
use backend\modules\post\models\PostcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostcategoryController implements the CRUD actions for Postcategory model.
 */
class PostcategoryController extends AsosController
{
    /**
     * {@inheritdoc}
     */

    /**
     * Lists all Postcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Postcategory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Postcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Postcategory();

        if ($model->load(Yii::$app->request->post()) )
        {
            if(!$model->save()){
                print_r($model->errors);
                echo $model->title_ru;
                die();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Postcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Postcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Postcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Postcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Postcategory::find()->andWhere(['id' => $id])->one()  ) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionMark($id)
    {
        $poscategory=Postcategory::find()->where(['id'=>$id])->one();
        if (Postcategory::STATUS_SHOWED==$poscategory->status){
            $poscategory->status=Postcategory::STATUS_NOTSHOWED;
        }
        else{
            $poscategory->status=Postcategory::STATUS_SHOWED;
        }
        $poscategory->save();
        return $this->redirect(['index']);
    }
}
