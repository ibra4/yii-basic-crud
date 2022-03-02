<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%model}}`.
 */
class m220301_132123_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%model}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'make_id' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%model}}');
    }
}
