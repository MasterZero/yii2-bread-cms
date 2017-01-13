<?php

use yii\db\Migration;
use common\models\Page;

class m170113_085813_page extends Migration
{
    public function up()
    {

        $this->dropTable('page');

        $this->createTable(Page::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(100)->notNull(),
            'content' => $this->text(),
        ]);
    }

    public function down()
    {
        echo "m170113_085813_page cannot be reverted.\n";

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
