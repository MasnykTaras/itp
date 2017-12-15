<?php 

namespace app\models;

use Yii;
use yii\helpers\Json;

class Site extends \yii\db\ActiveRecord
{
	 private static function getStaticPageData($alias)
    {
        return Yii::$app->db
            ->createCommand('SELECT * FROM static_page WHERE alias = :alias')
            ->bindValue(':alias', $alias)
            ->queryAll();
    }
    public function getContent($page)
    {
        $data = self::getStaticPageData($page)[0];
        
        return [
            'title' =>  $data['title'],
            'image' => Json::decode($data['content'])['image'],
            'text' => Json::decode($data['content'])['main-text'],
        ];
    }
	
}

?>