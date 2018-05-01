<?php

use yii\db\Migration;

class m180430_230849_create_table_plan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%plan}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string()->notNull(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'duration' => $this->integer()->notNull(),
            'price_per_week' => $this->double()->notNull()->defaultValue('0'),
            'price_per_month' => $this->double()->notNull()->defaultValue('0'),
            'points_per_week' => $this->integer()->notNull()->defaultValue('0'),
            'points_per_month' => $this->integer()->notNull()->defaultValue('0'),
            'lunch_per_week' => $this->integer()->notNull()->defaultValue('0'),
            'lunch_per_month' => $this->integer()->notNull()->defaultValue('0'),
            'snack_per_week' => $this->integer()->notNull()->defaultValue('0'),
            'snack_per_month' => $this->integer()->defaultValue('0'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%plan}}');
    }
}
