<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */



echo "<?php\n";

$matches = [];


preg_match('/m\d+_\d+_(\S+)/', $className, $matches );

$module_name = $matches[1];


?>
use console\components\Migration;

class <?= $className ?> extends Migration
{

    public $moduleName = '<?= $module_name ?>';

    public function safeUp()
    {
        return $this->model::migrate_up($this);
    }

    public function safeDown()
    {
        return $this->model::migrate_down($this);
    }
}