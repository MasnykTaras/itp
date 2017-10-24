<?php

use yii\db\Migration;

class m171017_084007_change_conferences_start_in_type extends Migration
{
   
    public function up()
    {
         $this->alterColumn('conferences', 'start_in', $this->dateTime());
    }

    public function down()
    {
        $this->alterColumn('conferences', 'start_in', $this->string());
    }
    
}
