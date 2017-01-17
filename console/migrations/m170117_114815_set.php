<?php



use console\components\Migration;

class m170117_114815_set extends Migration
{

    public $moduleName = 'set';

    public function up()
    {
        $modelName = ucfirst($this->moduleName);
        $modelPath = '\common\modules\\'.$this->moduleName.'\models\\'.$modelName;
        $table_name = $modelPath::tableName();

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);


        $this->createTable($table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'description' => $this->string(255)->notNull(),
            'value' => $this->longText()->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),
        ]);
    }

    public function down()
    {
        echo "m170117_114815_set cannot be reverted.\n";

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