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
            'author' => 'Author',
            'file' => 'Book File',
            'image' => 'Image',
            'status' => 'Status',
            'book_category_id' => 'Book Category ID',
        ];
    }
    /**
     * Get folder to upload book file
     * @return str
     */
    public function getFolder()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/book/';
    }
    /**
     * Get folder to upload book image
     * @return str
     */
    public function getFolderImage()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/';
    }
    /**
     * Get article status
     * @return array
     */
    public static function getStatus()
    {
        return [
            [ 'id' => 0, 'title' => 'Druft'],
            [ 'id' => 1, 'title' => 'Published'],
        ];
    }
    /**
     * Get current file
     * @param int $id 
     * @return array
     */
    public static function getCurrentFile($id)
    {
        return Yii::$app->db
                ->createCommand('SELECT file FROM book WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();
        // return Book::find()->select(['file'])->where([ 'id' => $id ])->column();
    }
    /**
     * Get current image
     * @param int $id 
     * @return array
     */
    public static function getCurrentImage($id)
    {
        return Yii::$app->db
                ->createCommand('SELECT image FROM book WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();
        // return Book::find()->select(['image'])->where([ 'id' => $id ])->column();
    }
}
