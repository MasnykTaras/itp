<?php

use yii\db\Migration;

class m170613_123035_change_user_uprate_at_type extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('user', 'updated_at', 'date');
    }

    public function safeDown()
    {
        echo "m170613_123035_change_user_uprate_at_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170613_123035_change_user_uprate_at_type cannot be reverted.\n";

        return false;
    }
    */
}
