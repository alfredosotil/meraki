<?php

use yii\db\Migration;

class m180430_230948_create_table_ingredients extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ingredients}}', [
            'id' => $this->primaryKey(),
            'group_food_id' => $this->integer()->notNull(),
            'type_ingredient_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'protein_per_gram' => $this->double()->notNull(),
            'color' => $this->string()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('*'),
        ], $tableOptions);

        $this->addForeignKey('fk_ingredients_group_food1', '{{%ingredients}}', 'group_food_id', '{{%group_food}}', 'id');
        $this->addForeignKey('fk_ingredients_type_ingredient1', '{{%ingredients}}', 'type_ingredient_id', '{{%type_ingredient}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%ingredients}}');
    }
}
