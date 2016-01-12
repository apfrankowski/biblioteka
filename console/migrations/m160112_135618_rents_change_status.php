<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_135618_rents_change_status extends Migration
{
    public function up()
    {
        $this->alterColumn( 'rents', 'status', $this->string());
    }

    public function down()
    {
        echo "m160112_135618_rents_change_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
