<?php

use yii\db\Migration;

class m170613_122522_change_user_created_at_and_uprate_at_type extends Migration
{
  

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {   
        $this->alterColumn('user', 'created_at', 'date');        

    }

    public function down()
    {
        echo "m170613_122522_change_user_created_at_and_uprate_at_type cannot be reverted.\n";

        return false;
    }
    
}
