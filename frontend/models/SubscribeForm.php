<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class SubscribeForm extends ActiveRecord
{
    public static function tableName()
    {
        return '{{subscribe}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'email' => 'Email',
            'subscribe_at' => 'Время добавления',
        ];
    }

}
