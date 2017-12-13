<?php

use yii\db\Migration;

/**
 * Class m171212_093901_create_table_static_page
 */
class m171212_093901_create_table_static_page extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('static_page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'alias' => $this->string(),
            'content' => $this->text(),
            'status' => $this->integer(),            
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('static_page');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        
    }

    public function down()
    {
        echo "m171212_093901_create_table_static_page cannot be reverted.\n";

        return false;
    }
    */
}
