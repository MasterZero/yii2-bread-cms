<?php
use console\components\Migration;

class m170819_144244_page extends Migration
{

    public $moduleName = 'page';

    public function safeUp()
    {
        return $this->model::migrate_up($this);
    }

    public function safeDown()
    {
        return $this->model::migrate_down($this);
    }
}