<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribe`.
 */
class m170615_102208_create_subscribe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('subscribe', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'subscribe_at' => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('subscribe');
    }
}
