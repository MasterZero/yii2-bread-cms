<?php

use yii\db\Migration;

class m170113_085651_page extends Migration
{
    public function up()
    {


        $this->createTable('page', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(100)->notNull(),
            'content' => $this->text(),
        ]);

    }

    public function down()
    {
        echo "m170113_085651_page cannot be reverted.\n";

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
