<?php



use console\components\Migration;

class m170117_122803_seo extends Migration
{

    public $moduleName = 'seo';

    public function up()
    {
        $modelName = ucfirst($this->moduleName);
        $modelPath = '\common\modules\\'.$this->moduleName.'\models\\'.$modelName;
        $table_name = $modelPath::tableName();

        if( \Yii::$app->db->schema->getTableSchema($table_name) != null)
            $this->dropTable($table_name);


        $this->createTable($table_name, [
            'id' => $this->primaryKey()->unsigned(),
            'module' => $this->string(255),
            'controller' => $this->string(255),
            'model_pk' => $this->integer()->unsigned(),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
            'title' => $this->string(255),
        ]);
    }

    public function down()
    {
        echo "m170117_122803_seo cannot be reverted.\n";

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