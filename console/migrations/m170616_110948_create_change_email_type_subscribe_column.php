<?php

use yii\db\Migration;

class m170616_110948_create_change_email_type_subscribe_column extends Migration
{
    public function safeUp()
    {
         $this->alterColumn('subscribe', 'email', $this->string()->notNull());
    }

    public function safeDown()
    {
       $this->dropColumn('subscribe', 'email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170616_110948_create_change_email_type_subscribe_column cannot be reverted.\n";

        return false;
    }
    */
}
