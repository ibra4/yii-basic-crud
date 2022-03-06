<?php

use yii\db\Migration;

/**
 * Class m220306_100515_add_column_document_to_post_table
 */
class m220306_100515_add_column_document_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'document', $this->string()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('post', 'document');
    }
}
