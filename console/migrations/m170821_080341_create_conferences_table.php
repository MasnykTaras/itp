<?php

use yii\db\Migration;

/**
 * Handles the creation of table `conferences`.
 */
class m170821_080341_create_conferences_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('conferences', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->string(),
            'user_id' => $this->integer(),
            'created' => $this->dateTime(),
            'start_in' => $this->dateTime(),
            'status' => $this->integer(),
            'image' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('conferences');
    }
}
