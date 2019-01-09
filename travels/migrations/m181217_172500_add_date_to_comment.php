<?php

use yii\db\Migration;

/**
 * Class m181217_172500_add_date_to_comment
 */
class m181217_172500_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
              $this->addColumn('comment','date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m181217_172500_add_date_to_comment cannot be reverted.\n";         закоментил
        $this->dropColumn('comment','date');
        //return false;                                                              закоментил
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181217_172500_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
