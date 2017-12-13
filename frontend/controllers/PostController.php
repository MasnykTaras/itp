<?php
 
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use yii\data\Pagination;

class PostController extends Controller
{
	 /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {	
        $query = Post::find()->where(['status' => 1])->orderBy('order ASC');
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(), 
            'defaultPageSize' => 3,            
            'pageSize' => 3,
            'forcePageParam' => false, 
            ]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
    	$posts = new Post;
        return $this->render('index', ['posts' =>  $models, 'pages' => $pages, ]);
    }
     /**
     * Lists One Post models.
     * @return mixed
     */
    public function actionOne($id)
    {	
    	$post = new Post;
    	return $this->render('post', ['post' => $post->viewOne($id)]);
    }
}
