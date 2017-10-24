<?php

namespace backend\controllers;

use Yii;
use backend\models\Conferences;
use backend\models\ConferencesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ConferencesController implements the CRUD actions for Conferences model.
 */
class ConferencesController extends Controller
{
    /**
     * @inheritdoc
     */
  

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Conferences models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConferencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Conferences model.
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
     * Creates a new Conferences model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Conferences();
 
        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'image')){
                $model->image = UploadedFile::getInstance($model, 'image');

                $model->image->saveAs($model->getFolderImage() . $model->image->name);

                $model->image = $model->image->name; 
            }else{
                return $this->render('create', [
                 'model' => $model,
                ]);
            }
           
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Conferences model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if(!empty(UploadedFile::getInstance($model, 'image'))){
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs($model->getFolderImage() . $model->image->name);
                $model->image = $model->image->name;
            }else{
                $model->image = Conferences::getCurrentImage($model->id)[0];
            }
            // var_dump($model);
            // die;
            // $model->start_in = $model->start_in;
            
            $model->save();
           
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Conferences model.
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
     * Finds the Conferences model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conferences the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conferences::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
