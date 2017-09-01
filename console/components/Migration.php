<?php

namespace console\components;

class Migration extends \yii\db\Migration
{

    const TYPE_LONGTEXT = 'longtext';

    public function longText()
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(self::TYPE_LONGTEXT);
    }


    public $model;

    public function init()
    {

        $this->model = '\common\modules\\'.
            $this->moduleName.'\models\\'.
            ucfirst($this->moduleName);

        return parent::init();
    }
}
