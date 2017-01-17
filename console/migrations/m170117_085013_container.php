<?php



use console\components\Migration;

class m170117_085013_container extends Migration
{

    public $moduleName = 'module';

    public function up()
    {
        $modelName = ucfirst($this->$moduleName);
        $modelPath = '\common\modules\\'.$moduleName.'\models\\'.$modelName;
        $table_name = $modelPath::tableName();

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
        echo "m170117_085013_container cannot be reverted.\n";

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