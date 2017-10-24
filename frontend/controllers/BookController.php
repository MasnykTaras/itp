<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use app\models\Book;
use yii\data\Pagination;

class BookController extends \yii\web\Controller
{   
    public function actionIndex()
    {

    	$query = Book::viewAll();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(), 
            'defaultPageSize' => 3,            
            'pageSize' => 3,
            'forcePageParam' => false, 
            ]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
    	
        return $this->render('index', ['books' =>  $models, 'pages' => $pages, ]);
    }
    public function actionOne($id)
    {
    	$book = new Book;
    	$category = $book->getCategory($id);        
    	return $this->render('book', ['book' => $book->viewOne($id), 'related' => $book->getRelatedBooks($category), ]);
    }
}
