<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book_category".
 *
 * @property int $id
 * @property string $title
 */
class BookCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_category';
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
    public function attributeLabels()
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
        return BookCategory::find()->all(); 
    }
}
