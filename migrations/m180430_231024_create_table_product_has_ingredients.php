<?php

use yii\db\Migration;

class m180430_231024_create_table_product_has_ingredients extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_has_ingredients}}', [
            'product_id' => $this->integer()->notNull(),
            'ingredients_id' => $this->integer()->notNull(),
            'grams_per_ingredient' => $this->double()->notNull()->defaultValue('0'),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%product_has_ingredients}}', ['product_id', 'ingredients_id']);
        $this->addForeignKey('fk_product_has_ingredients_ingredients1', '{{%product_has_ingredients}}', 'ingredients_id', '{{%ingredients}}', 'id');
        $this->addForeignKey('fk_product_has_ingredients_product1', '{{%product_has_ingredients}}', 'product_id', '{{%product}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%product_has_ingredients}}');
    }
}
