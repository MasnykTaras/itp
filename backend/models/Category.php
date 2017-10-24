<?php

namespace backend\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public  function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
    /**
     * Get category
     * @return array
     */
    public static function getCategory()
    {
        return self::find()->all(); 
    }
    /**
     * Get category 
     * @param int $id 
     * @return array
     */
    public static function getOneCategory($id)
    {       
        
        return  Yii::$app->db
                ->createCommand('SELECT title FROM category WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();
    }
}
