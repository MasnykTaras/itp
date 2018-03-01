<?php

use yii\db\Migration;

/**
 * Class m171212_101612_create_column_static_page_template
 */
class m171212_101612_create_column_static_page_template extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('static_page', 'template', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('static_page', 'template');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171212_101612_create_column_static_page_template cannot be reverted.\n";

        return false;
    }
    */
}
