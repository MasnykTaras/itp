<?php

use yii\db\Migration;

/**
 * Class m171213_145946_change_column_alias_unique
 */
class m171213_145946_change_column_alias_unique extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->execute('ALTER TABLE static_page CHANGE COLUMN alias alias VARCHAR(255) NOT NULL , ADD UNIQUE INDEX alias_UNIQUE (alias ASC);');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171213_145946_change_column_alias_unique cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171213_145946_change_column_alias_unique cannot be reverted.\n";

        return false;
    }
    */
}
