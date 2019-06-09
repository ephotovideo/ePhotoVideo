<?php

use yii\db\Migration;

/**
 * Class m190609_113410_unlock
 */
class m190609_113410_unlock extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190609_113410_unlock cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190609_113410_unlock cannot be reverted.\n";

        return false;
    }
    */
}
