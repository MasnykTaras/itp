<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Conference;
use yii\data\Pagination;

class ConferenceController extends Controller
{
    public function actionIndex($data = '')
    {	
        if($data){
            $dataExp = explode('.', $data);
            $dataM = $dataExp[0];
            $dataY = $dataExp[1];
            $total = Yii::$app->db
                ->createCommand('SELECT count(*) AS count FROM conferences ' .
                                    'WHERE MONTH(start_in) = :dataM AND YEAR(start_in) = :dataY ')
                ->bindValue(':dataM', $dataM)
                ->bindValue(':dataY', $dataY)
                ->queryAll();;
            
        }else{
             $total = Yii::$app->db
                ->createCommand('SELECT count(*) AS count FROM conferences')
                ->queryAll();
                
        }

        $pages = new Pagination([
            'totalCount' => $total[0]['count'],
            'defaultPageSize' => Conference::POSTPERPAGE,     
            'pageSize' => Conference::POSTPERPAGE,     
            'forcePageParam' => false, 
        ]);

        if($data){        
            $models = Yii::$app->db
                ->createCommand('SELECT * FROM conferences ' .
                                    'WHERE MONTH(start_in) = :dataM AND YEAR(start_in) = :dataY ' .
                                    'LIMIT :limit '.
                                     'OFFSET :offset')                                
                ->bindValue(':dataM', $dataM)
                ->bindValue(':dataY', $dataY)
                ->bindValue(':limit', $pages->limit)
                ->bindValue(':offset', $pages->offset)
                ->queryAll();
        }else{
            $models = Yii::$app->db
                ->createCommand('SELECT * FROM conferences ' .
                                    'LIMIT :limit '.
                                     'OFFSET :offset')                                
                ->bindValue(':limit', $pages->limit)
                ->bindValue(':offset', $pages->offset)
                ->queryAll();
        }    
        $conf = new Conference();
           
    	$content = $conf->getContent();
        return $this->render('index', ['conferences' =>  $models, 'pages' => $pages, 'data' => $data, 'content' => $content ]);
    }
     /**
     * Lists One Post models.
     * @return mixed
     */
    public function actionOne($id)
    {	
    	$conference = new Conference;
    	return $this->render('conference', ['conference' => $conference->viewOne($id)]);
    }

}
