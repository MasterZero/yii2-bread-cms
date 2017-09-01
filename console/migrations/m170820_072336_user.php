<?php
use console\components\Migration;

class m170820_072336_user extends Migration
{

    public $moduleName = 'user';

    public function safeUp()
    {
        return $this->model::migrate_up($this);
    }

    public function safeDown()
    {
        return $this->model::migrate_down($this);
    }
}