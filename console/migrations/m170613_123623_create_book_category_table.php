<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book_category`.
 */
class m170613_123623_create_book_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book_category');
    }
}
