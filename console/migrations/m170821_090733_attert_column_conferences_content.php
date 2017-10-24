<?php

use yii\db\Migration;

class m170821_090733_attert_column_conferences_content extends Migration
{
        
    public function up()
    {
        $this->alterColumn('conferences', 'content', $this->text());
    }

    public function down()
    {
        $this->alterColumn('conferences', 'content', $this->string());
    }

}
