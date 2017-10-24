<?php

namespace backend\controllers;

use Yii;
use backend\models\Book;
use backend\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
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
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book(); 
        if ($model->load(Yii::$app->request->post())){
                if(UploadedFile::getInstance($model, 'file') && UploadedFile::getInstance($model, 'image')){
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->image = UploadedFile::getInstance($model, 'image');

                    $model->file->saveAs($model->getFolder() . $model->file->name);
                    $model->image->saveAs($model->getFolderImage() . $model->image->name);

                    $model->file = $model->file->name;
                    $model->image = $model->image->name;
                }else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                $model->save(); 

                return $this->redirect(['view', 'id' => $model->id]);
                
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
                
                if(!empty(UploadedFile::getInstance($model, 'file'))){
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->file->saveAs($model->getFolder() . $model->file->name);
                    $model->file = $model->file->name;
                }else{
                    $model->file = Book::getCurrentFile($model->id)[0];
                }
                if(!empty(UploadedFile::getInstance($model, 'image'))){
                    $model->image = UploadedFile::getInstance($model, 'image');                
                    $model->image->saveAs($model->getFolderImage() . $model->image->name);                
                    $model->image = $model->image->name;
                }else{
                    $model->image =   Book::getCurrentImage($model->id)[0];
                }
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
               
        } else {
            
                return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
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
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
