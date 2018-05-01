<?php

use yii\db\Migration;

class m180430_231106_alter_table_user_add_foreign_key extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addForeignKey('fk_user_history1', '{{%user}}', 'history_id', '{{%history}}', 'id');
    }

    public function down()
    {
        echo "m180430_231106_alter_table_user_add_foreign_key cannot be reverted.\n";

        return false;
    }
    
}
