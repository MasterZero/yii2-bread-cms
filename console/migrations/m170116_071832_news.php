<?php



use console\components\Migration;

class m170116_071832_news extends Migration
{

    public $moduleName = 'news';

    public function up()
    {
        $foreignKeyName = 'FK_news';
        $modelName = ucfirst($this->moduleName);
        $modelPath = '\common\modules\\'.$this->moduleName.'\models\\'.$modelName;
        $categoryModelPath = $modelPath.'Category';
        $table_name = $modelPath::tableName();
        $category_table_name =  $categoryModelPath::tableName();

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);

        if( \Yii::$app->db->schema->getTableSchema($category_table_name) != null)
            $this->dropTable($category_table_name);




        $this->createTable($category_table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'removed' => $this->boolean()->notNull(),

            'lft' => $this->integer()->unsigned(),
            'rgt' => $this->integer()->unsigned(),
            'depth' => $this->integer()->unsigned(),
            'root' => $this->integer()->unsigned(),
            'tree' => $this->integer()->unsigned(),
        ]);

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

            'description' => $this->longText()->notNull(),

            $this->moduleName.'_category_id' => $this->integer()->unsigned(),
            'index' => $this->integer(),
            'image' => $this->string(255),
        ]);

        $this->addForeignKey($foreignKeyName, $table_name, $this->moduleName.'_category_id',
            $category_table_name, 'id','NO ACTION','NO ACTION');

    }

    public function down()
    {
        echo "m170116_071832_news cannot be reverted.\n";

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