<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%make}}`.
 */
class m220301_130921_create_make_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%make}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'state' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-make-author_id',
            'make',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%make}}');
    }
}
