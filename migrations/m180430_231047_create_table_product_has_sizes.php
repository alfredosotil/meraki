<?php

use yii\db\Migration;

class m180430_231047_create_table_product_has_sizes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_has_sizes}}', [
            'product_id' => $this->integer()->notNull(),
            'sizes_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%product_has_sizes}}', ['product_id', 'sizes_id']);
        $this->addForeignKey('fk_product_has_sizes_product1', '{{%product_has_sizes}}', 'product_id', '{{%product}}', 'id');
        $this->addForeignKey('fk_product_has_sizes_sizes1', '{{%product_has_sizes}}', 'sizes_id', '{{%sizes}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%product_has_sizes}}');
    }
}
