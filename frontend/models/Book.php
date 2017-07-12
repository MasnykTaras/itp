<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $author
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
            [['title', 'author', 'file', 'image'], 'string', 'max' => 255],
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
            'author' => 'Author',
            'file' => 'File',
            'image' => 'Image',
            'status' => 'Status',
            'book_category_id' => 'Book Category ID',
        ];
    }
     public function getNewBook()
    {
        return Post::find()->where([ 'status' => 1 ])->orderBy('id')->limit(5)->all();
    }
}
