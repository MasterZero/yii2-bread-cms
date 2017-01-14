<?php



use console\components\Migration;

class m170114_102310_page extends Migration
{
    public function up()
    {

        $modelName = '\common\modules\page\models\Page';
        $table_name = $modelName::tableName();

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);


        $this->createTable($table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'content' => $this->longText()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),
        ]);
    }

    public function down()
    {
        echo "m170114_102310_page cannot be reverted.\n";

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