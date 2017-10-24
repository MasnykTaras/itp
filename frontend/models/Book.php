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
    const BOOK = 5;
    const RELETE = 6;
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
    /**
     * Get new book on main page
     * @return array
     */
     public function getNewBook()
    {   
        return Yii::$app->db
                ->createCommand('SELECT * FROM book WHERE status = :status ORDER BY id LIMIT '.self::BOOK)
                ->bindValue(':status', 1)
                ->queryAll();

        // return self::find()->where([ 'status' => 1 ])->orderBy('id')->limit(self::BOOK)->all();
    }
    public static function viewAll()
    {
        return self::find()->where(['status' => 1]);
    }
    /**
     * Get one article
     * @param int $id 
     * @return array
     */
    public function viewOne($id)
    {
        return Yii::$app->db
                ->createCommand('SELECT * FROM book WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryOne();
        // return self::find()->where(['id' => $id ])->one();
    }
    /**
     * Get file info
     * @param  $filename 
     * @return array
     */
    public static function getFileInfo($filename)
    {        
        return [
            'type' => self::getType($filename),
            'size' => self::getSize($filename)
        ];
    }
    /**
     * Get file size
     * @param str $filename 
     * @return int
     */
    private static function getSize($filename)
    {
        $size = filesize('uploads/book/' . $filename);      
        $decimals = 2;
        $sz = 'BKMGTP';
        $factor = floor((strlen($size) - 1) / 3);
        return number_format($size / pow(1024, $factor),2).@$sz[$factor];
    }
    /**
     * Get file type
     * @param str $filename 
     * @return str
     */
    private static function getType($filename)
    {   
        $type = explode('.', $filename);
        return end($type);
    }
    /**
     * Get relate books
     * @param str $category 
     * @return array
     */
    public static function getRelatedBooks($category)
    {   

        return Yii::$app->db->createCommand('SELECT * FROM book WHERE status = :status AND book_category_id = :category ORDER BY id LIMIT ' . self::RELETE)->bindValue(':category', $category[0])->bindValue(':status', 1)->queryAll();
        // return self::find()->where([ 'status' => 1, 'book_category_id' => $category ])->orderBy('id')->limit(self::RELETE)->all();
    }
    /**
     * Get book category
     * @param int $id 
     * @return array
     */
    public static function getCategory($id)
    {
        return Yii::$app->db
            ->createCommand('SELECT book_category_id FROM book WHERE status = :status AND id = :id')
            ->bindValue(':id', $id)
            ->bindValue(':status', 1)
            ->queryColumn();
        // return self::find()->select('book_category_id')->where(['status' => 1, 'id' => $id ])->one();
    }
}
