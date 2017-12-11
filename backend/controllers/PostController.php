<?php

namespace backend\controllers;

use Yii;
use backend\models\Post;
use backend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [                        
                        'allow' => true,
                        'roles' => ['admin', 'moder'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider( [
            'query' => Post::find( )->orderBy( 'order' ),    // notice the orderBy clause
            'sort' => false,
            'pagination' => [
                'pageSize' => 10,
            ]
        ] );

        return $this->render('index', [
            
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionOrder( ) {
        $post = Yii::$app->request->post( );

        if (isset( $post['key'], $post['pos'] ))   {
            $model = $this->findModel( $post['key']);
            $model->order( $post['pos'] );
            
            $model->order = $post['pos'];
            $model->save();

        }    

    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

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
     * Updates an existing Post model.
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
               $model->image = Post::getCurrentImage($model->id)[0]; 
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
