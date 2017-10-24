<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property string $created
 * @property int $category_id
 * @property int $status
 * @property string $image
 */
class Post extends ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'user_id' => 'User ID',
            'created' => 'Created',
            'category_id' => 'Categoty ID',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }
     /**
     * Lists all Post models.
     * @return mixed
     */
    public static function viewAll()
    {        
     return self::find()->all();   
    }
     /**
     * Lists all Post models.
     * @return mixed
     */
    public static function viewOne($id)
    {
        return self::find()->where(['id' => $id ])->one();
    }
     /**
      * Get created data without time
      * @param str $date 
      * @return str
      */
    public function dateView($date)
    {
        $date = explode(' ', $date);
        return $date[0]; 
    }
    /**
     * Get short content
     * @param str $content 
     * @return str
     */
    public function shortContent($content)
    {
        return  substr(strip_tags($content), 0, 300) . '...';
    }
    /**
     * Get new post on main page 
     * @return array
     */
    public function getNewPost()
    {
        return self::find()->where([ 'status' => 1 ])->orderBy('created')->limit(6)->all();
    }
    public function getNextId($id)
    {
        $record = self::find()->where( "id > $id" )->limit(1)->one();
        if($record!==null)
            return $record->id;
        return null;
    }
    public function getPreviousId($id)
    {
        $record = self::find()->where( "id < $id" )->orderBy('id DESC')->limit(1)->one();
        if($record!==null)
            return $record->id;
        return null;
    }
}
