<?php



use console\components\Migration;

class m170118_073619_gallery extends Migration
{

    public $moduleName = 'gallery';

    public function up()
    {
        $foreignKeyName = 'FK_'.$this->moduleName;
        $modelName = ucfirst($this->moduleName);
        $modelPath = '\common\modules\\'.$this->moduleName.'\models\\'.$modelName;
        $itemModelPath = $modelPath.'Image';
        $table_name = $modelPath::tableName();
        $item_table_name =  $itemModelPath::tableName();

        if( \Yii::$app->db->schema->getTableSchema($item_table_name) != null)
            $this->dropTable($item_table_name);

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);




        $this->createTable($item_table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'image' => $this->string(255)->notNull(),
            'content' => $this->longText(),
            'description' => $this->longText(),

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
            'description' => $this->longText(),
            'content' => $this->longText(),

            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'deleted_at' => $this->datetime(),
            'removed' => $this->boolean()->notNull(),
            'deleted' => $this->boolean()->notNull(),

            'lft' => $this->integer()->unsigned(),
            'rgt' => $this->integer()->unsigned(),
            'depth' => $this->integer()->unsigned(),
            'tree' => $this->integer()->unsigned(),

        ]);

        $this->addForeignKey($foreignKeyName, $item_table_name, $this->moduleName.'_id',
            $table_name, 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        echo "m170118_073619_gallery cannot be reverted.\n";

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