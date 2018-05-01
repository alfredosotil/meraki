<?php

use yii\db\Migration;

class m180430_230822_create_table_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'uuid' => $this->string()->notNull(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'deleted_at' => $this->string(),
            'amount' => $this->double()->notNull(),
            'shipp_name' => $this->string()->notNull(),
            'shipp_address' => $this->string()->notNull(),
            'departament' => $this->string()->notNull(),
            'province' => $this->string()->notNull(),
            'district' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'shipping' => $this->double()->notNull()->defaultValue('0'),
            'tax' => $this->double()->notNull()->defaultValue('0'),
            'shipped' => $this->smallInteger()->notNull()->defaultValue('0'),
            'tracking_number' => $this->string()->notNull(),
            'is_paid' => $this->smallInteger()->notNull()->defaultValue('0'),
            'type_payment' => $this->string()->notNull(),
            'notes' => $this->string(),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
        ], $tableOptions);

        $this->addForeignKey('fk_order_user1', '{{%order}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
