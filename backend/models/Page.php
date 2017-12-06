<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $published
 * @property string $content
 * @property string $title_browser
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['published'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'default', 'value' => date("Y-m-d H:i:s")],
            [['title', 'alias', 'title_browser'], 'string', 'max' => 255],
            [['meta_keywords'], 'string', 'max' => 200],
            [['meta_description'], 'string', 'max' => 160],
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
            'published' => 'Published',
            'content' => 'Content',
            'title_browser' => 'Title Browser',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Get status
     * @return array
     */
    public static function getStatus()
    {
        return [
            [ 'id' => 0, 'title' => 'Druft'],
            [ 'id' => 1, 'title' => 'Published'],
        ];
    }
}
