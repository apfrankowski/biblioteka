<?php

namespace frontend\controllers;

use Yii;
use yii\db\ActiveRecord;
use app\models\Rents;
use app\models\Books;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\BlameableBehavior;

/**
 * RentsController implements the CRUD actions for Rents model.
 */
class RentsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by'],
                ],
         ],
         ];
    }

    /**
     * Redirect home.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->goHome();
    }

    /**
     * Displays a single Rents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rents();

        $model->user_id = Yii::$app->user->id;
        $model->rent_date = date('Y-m-d', time());
        $model->prev_date = date('Y-m-d', strtotime('+ 2 weeks', time()));
        $model->status = 'rented';

        if (isset($_GET['book_id'])) {
            $model->book_id = $_GET['book_id'];
            $model->save();
            $book = Books::findOne($model->book_id)->updateStatus($model->status);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            print_r( Yii::$app->request->get());
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates a new Rents model with closing info.
     * @return mixed
     */
    public function actionClose()
    {
        if (isset($_GET['book_id'])) {

            if ($model = Rents::find()->where([
                'book_id' => $_GET['book_id'], 
                'user_id' => Yii::$app->user->id,
                'status' => 'rented'])->one()) {

                $model->prev_date = date('Y-m-d', time());
                $model->status = 'closed';
                $model->save();
                $book = Books::findOne($model->book_id)->updateStatus('available');
            }
            return $this->redirect(['book/index']);
        } else {
            return $this->redirect(['book/index']);
        }
    }

    /**
     * Updates an existing Rents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
