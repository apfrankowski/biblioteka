<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_132844_queue extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('queue', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'reg_date' => $this->date()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('queue');
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
