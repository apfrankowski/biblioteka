<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_145733_books_change extends Migration
{
    public function up()
    {
        $this->alterColumn( 'books', 'status', $this->string());
    }

    public function down()
    {
        echo "m160112_145733_books_change cannot be reverted.\n";

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
