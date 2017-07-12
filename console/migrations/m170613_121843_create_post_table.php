<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m170613_121843_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text(),
            'user_id' => $this->integer(),
            'created' => $this->dateTime(),
            'categoty_id' => $this->integer(),
            'status' => $this->integer(),
            'image' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
