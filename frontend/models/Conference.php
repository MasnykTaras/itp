<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conferences".
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
class Conference extends \yii\db\ActiveRecord
{

    const POSTPERPAGE = 3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conferences';
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
    /**
     * Get short content
     * @param str $content 
     * @return str
     */
    public static function shortContent($content)
    {
        return  substr(strip_tags($content), 0, 300) . '...';
    }
    /**
     * Get one article
     * @param int $id 
     * @return array
     */
    public function viewOne($id)
    {
        return self::find()->where(['id' => $id ])->one();
    }
    /**
     * Get start_in from db
     * @return array
     */
    private static function getDateArchive()
    {
        // return self::find()->select('start_in')->all();
        return Yii::$app->db
                ->createCommand('SELECT start_in AS data FROM conferences ORDER BY start_in')
                ->queryAll();
    }
    public static function createDateArrat()
    {
        $archive = self::getDateArchive();
        $dateArchive = array();
       
        foreach ($archive as $value) {
           
             $dateArchive[] .= date('m.Y', strtotime($value['data']));
        }

        return array_unique($dateArchive);
       
    }
}
