<?php



use console\components\Migration;

class m170117_104244_container extends Migration
{

    public $moduleName = 'module';

    public function up()
    {
        $foreignKeyName = 'FK_container';
        $modelName = ucfirst($this->moduleName);
        $modelPath = '\common\modules\\'.$this->moduleName.'\models\\'.$modelName;
        $itemModelPath = $modelPath.'Item';
        $table_name = $modelPath::tableName();
        $item_table_name =  $itemModelPath::tableName();

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);

        if( \Yii::$app->db->schema->getTableSchema($item_table_name) != null)
            $this->dropTable($item_table_name);




        $this->createTable($item_table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'image' => $this->string(255),
            'content' => $this->longText()->notNull(),
            'description' => $this->longText()->notNull(),

            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),

             $this->moduleName.'_id' => $this->integer()->unsigned(),
            'index' => $this->integer(),

        ]);

        $this->createTable($table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
            'image' => $this->string(255),
            'description' => $this->longText()->notNull(),
            'content' => $this->longText()->notNull(),

            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),

        ]);

        $this->addForeignKey($foreignKeyName, $item_table_name, $this->moduleName.'_id',
            $table_name, 'id','NO ACTION','NO ACTION');
    }

    public function down()
    {
        echo "m170117_104244_container cannot be reverted.\n";

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