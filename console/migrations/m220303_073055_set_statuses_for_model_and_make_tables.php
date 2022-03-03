<?php

use yii\db\Migration;

/**
 * Class m220303_073055_set_statuses_for_model_and_make_tables
 */
class m220303_073055_set_statuses_for_model_and_make_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('make', 'state', 'status');
        $this->addColumn('model', 'status', $this->integer()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('make', 'status', 'state');
        $this->dropColumn('model', 'status');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220303_073055_set_statuses_for_model_and_make_tables cannot be reverted.\n";

        return false;
    }
    */
}
