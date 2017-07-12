<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $autor
 * @property string $file
 * @property string $image
 * @property int $status
 * @property int $book_category_id
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['status', 'book_category_id'], 'integer'],
            [['title', 'author'], 'string', 'max' => 255],
            [['file'], 'required'],
            [['file'], 'file'],
            [['image'], 'image'],
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
            'author' => 'Autor',
            'file' => 'Book File',
            'image' => 'Image',
            'status' => 'Status',
            'book_category_id' => 'Book Category ID',
        ];
    }
    public function getFolder()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/book/';
    }
    
}
