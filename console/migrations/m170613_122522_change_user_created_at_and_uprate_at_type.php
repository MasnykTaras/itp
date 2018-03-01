<?php

use yii\db\Migration;

class m170613_122522_change_user_created_at_and_uprate_at_type extends Migration
{
  

    
    // Use up()/down() to run migration code without a transaction.
    public function safeUp()
    {   
        $this->alterColumn('user', 'created_at', 'date');        

    }

    public function safeDown()
    {
        $this->dropColumn('user', 'created_at');
    }
    
}
