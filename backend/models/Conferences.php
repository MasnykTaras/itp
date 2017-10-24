<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Conferences".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property string $created
 * @property string $start_in
 * @property int $status
 * @property string $image
 */
class Conferences extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
 

    public static function tableName()
    {
        return 'Conferences';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],            
            [['title',], 'string', 'max' => 255],
            [['content'], 'string'],
            [['image'], 'image', 'extensions' => 'png, jpg'],
            [['created'], 'default', 'value' => date("Y-m-d H:i:s")],
            [['start_in'], 'default', 'value' => date("Y-m-d")],
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
            'start_in' => 'Start In',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }
    public  function getFolderImage()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/';
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
                ->createCommand('SELECT image FROM conferences WHERE id = :id')
                ->bindValue(':id', $id)
                ->queryColumn();
        // return self::find()->select(['image'])->where([ 'id' => $id ])->column();
    }
}
