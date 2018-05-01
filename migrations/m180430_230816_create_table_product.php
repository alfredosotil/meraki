<?php

use yii\db\Migration;

class m180430_230816_create_table_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string()->notNull(),
            'price' => $this->double()->notNull()->defaultValue('0'),
            'short_description' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'thumbnail' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'type_nutrition' => $this->string()->notNull(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'stock' => $this->integer()->notNull()->defaultValue('0'),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
