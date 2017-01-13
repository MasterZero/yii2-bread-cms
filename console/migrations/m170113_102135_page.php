<?php

//use yii\db\Migration;
use console\components\Migration;
use common\models\Page;

class m170113_102135_page extends Migration
{
    public function up()
    {

        $this->dropTable(Page::tableName());


        $this->createTable(Page::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'content' => $this->longText(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime()->notNull(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),
        ]);
    }

    public function down()
    {
        echo "m170113_102135_page cannot be reverted.\n";

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
