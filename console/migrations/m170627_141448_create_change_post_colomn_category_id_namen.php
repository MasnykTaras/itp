<?php

use yii\db\Migration;

class m170627_141448_create_change_post_colomn_category_id_namen extends Migration
{
  

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->renameColumn('post', 'categoty_id', 'category_id');
    }

    public function down()
    {
        echo "m170627_141448_create_change_post_colomn_category_id_namen cannot be reverted.\n";

        return false;
    }
}
