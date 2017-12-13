<?php

namespace backend\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\web\view;

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
     public function behaviors( ) {
        return [
            [
                'class' => 'sjaakp\sortable\Sortable',
                'orderAttribute' => 'order',
            ],
        ];
    }
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
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['user_id', 'category_id', 'status'], 'integer'],
            [['created'], 'default', 'value' => date("Y-m-d H:i:s")],
            [['title', 'image'], 'string', 'max' => 255],
        ];
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

    public function getFolderImage()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/';
    }

    public static function shortContent($content)
    {
        $content = substr(strip_tags($content), 0, 600) . '...';

        return  $content;
    }
    public static function getStatus()
    {
        return [
            [ 'id' => 0, 'title' => 'Druft'],
            [ 'id' => 1, 'title' => 'Published'],
        ];
    }
    public static function getCurrentImage($id)
    {

        return Yii::$app->db
                ->createCommand('SELECT image FROM post WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();
        // return Post::find()->select(['image'])->where([ 'id' => $id ])->column();
    }

     
}
