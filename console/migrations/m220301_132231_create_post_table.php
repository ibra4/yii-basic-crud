<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m220301_132231_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer(),
            'model_id' => $this->integer()->notNull(),
            'make_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-post-model_id',
            'post',
            'model_id',
            'model',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-post-make_id',
            'post',
            'make_id',
            'make',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
