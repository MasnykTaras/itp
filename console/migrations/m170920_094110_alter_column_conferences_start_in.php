<?php

use yii\db\Migration;

class m170920_094110_alter_column_conferences_start_in extends Migration
{
    

    public function up()
    {
        $this->alterColumn('conferences', 'start_in', $this->string());
    }

    public function down()
    {
        $this->alterColumn('conferences', 'start_in', $this->dateTime());
    }
}
