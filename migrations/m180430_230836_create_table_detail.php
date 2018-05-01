<?php

use yii\db\Migration;

class m180430_230836_create_table_detail extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'uuid' => $this->string()->notNull(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'description' => $this->string()->notNull(),
            'price_per_unit' => $this->double()->notNull()->defaultValue('0'),
            'price' => $this->double()->notNull()->defaultValue('0'),
            'tax' => $this->double()->notNull()->defaultValue('0'),
            'vat' => $this->double()->notNull()->defaultValue('0'),
            'qty' => $this->integer()->notNull()->defaultValue('0'),
        ], $tableOptions);

        $this->addForeignKey('fk_detail_order', '{{%detail}}', 'order_id', '{{%order}}', 'id');
        $this->addForeignKey('fk_detail_product', '{{%detail}}', 'product_id', '{{%product}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%detail}}');
    }
}
