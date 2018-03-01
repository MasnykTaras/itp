<?php

use yii\db\Migration;

class m170703_120251_create_add_user_colomn_role extends Migration
{
   
    public function up()
    {
        $this->addColumn('user', 'role', $this->integer());
    }

    public function down()
    {
       $this->dropColumn('user', 'role');
    }
}
