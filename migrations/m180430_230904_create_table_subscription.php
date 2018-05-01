<?php

use yii\db\Migration;

class m180430_230904_create_table_subscription extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'plan_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'lunches_delivered' => $this->integer()->notNull()->defaultValue('0'),
            'snacks_delivered' => $this->integer()->notNull()->defaultValue('0'),
            'uuid' => $this->string()->notNull(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'starts_at' => $this->string()->notNull(),
            'ends_at' => $this->string()->notNull(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'subscription_state_id' => $this->integer()->notNull()->defaultValue('1'),
            'is_active' => $this->integer()->notNull()->defaultValue('1'),
        ], $tableOptions);

        $this->addForeignKey('fk_subscription_plan1', '{{%subscription}}', 'plan_id', '{{%plan}}', 'id');
        $this->addForeignKey('fk_subscription_user1', '{{%subscription}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%subscription}}');
    }
}
