<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m170613_123203_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text(),
            'autor' => $this->string(),
            'file' => $this->string(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'book_category_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('book');
    }
}
