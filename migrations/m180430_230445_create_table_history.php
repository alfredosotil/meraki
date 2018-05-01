<?php

use yii\db\Migration;

class m180430_230445_create_table_history extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string()->notNull(),
            'is_alergic' => $this->smallInteger()->notNull()->defaultValue('0'),
            'description' => $this->string()->notNull(),
            'indications' => $this->string(),
            'type_nutrition' => $this->string(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%history}}');
    }
}
