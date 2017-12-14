<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "static_page".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $content
 * @property int $status
 */
class StaticPage extends \yii\db\ActiveRecord
{

    public $image = '';

    public $statusTitle;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['status', 'template'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
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
            'alias' => 'Alias',
            'template' => 'Template',
            'content' => 'Content',
            'status' => 'Status',           
        ];
    }
    public static function getPageTemplate()
    {
        return [
            ['id' => 0, 'title' => 'Post' , 'alias' => 'post'],
            ['id' => 1, 'title' => 'Main', 'alias' => 'main'],
            ['id' => 2, 'title' => 'About', 'alias' => 'about'],
            ['id' => 3, 'title' => 'Book', 'alias' => 'book'],
            ['id' => 4, 'title' => 'Contact', 'alias' => 'contact'],
        ];
    }
    public function getTemplateTitle($id)
    {
        $templates = StaticPage::getPageTemplate(); 

        return $templates[$id]['title'];
    }   

    public function getTemplateAlias($id)
    {
        $templates = StaticPage::getPageTemplate(); 

        return $templates[$id]['alias'];
    }
    /**
     * Get folder to upload book file
     * @return str
     */
    public function getFolder()
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
    public function getStatusTitle($id)
    {
        $statusId = Yii::$app->db
                ->createCommand('SELECT status FROM static_page WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();

        return self::getStatus()[$statusId[0]]['title'];
    }
    public function getFormTemplate($model)
    {
        return '_form-'.strtolower($model->getTemplateTitle($model->template));
    }
       
}
