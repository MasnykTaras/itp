<?php

use yii\db\Migration;

/**
 * Class m171211_103222_add_order_column_post
 */
class m171211_103222_add_order_column_post extends Migration
{  
    public function up()
    {
        $this->addColumn('post', 'order', $this->integer());
    }

    public function down()
    {
        echo "m171211_103222_add_order_column_post cannot be reverted.\n";

        return false;
    }
}
