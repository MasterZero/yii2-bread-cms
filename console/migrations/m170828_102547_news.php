<?php
use console\components\Migration;

class m170828_102547_news extends Migration
{

    public $moduleName = 'news';

    public function safeUp()
    {
        return $this->model::migrate_up($this);
    }

    public function safeDown()
    {
        return $this->model::migrate_down($this);
    }
}