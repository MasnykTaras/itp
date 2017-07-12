<?php

use yii\db\Migration;

class m170710_143850_create_change_book_colomn_autor_name extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         $this->renameColumn('book', 'autor', 'author');
    }

    public function down()
    {
        echo "m170710_143850_create_change_book_colomn_autor_name cannot be reverted.\n";

        return false;
    }
   
}
