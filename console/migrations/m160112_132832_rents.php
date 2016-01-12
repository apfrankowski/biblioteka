<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_132832_rents extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('rents', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'rent_date' => $this->date(),
            'prev_date' => $this->date(),
            'status' => $this->boolean()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('rents');
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
