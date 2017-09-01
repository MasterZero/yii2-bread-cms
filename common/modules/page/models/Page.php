<?php

namespace common\modules\page\models;


use \common\components\UrlValidator;

class Page extends \common\components\ActiveRecord
{
    public static function tableName()
    {
        return '{{%page}}';
    }

    public function customRules()
    {
        return [
            [['name', 'url', 'content'], 'required'],
            [['name', 'url'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 65535],
            [['removed','deleted'], 'boolean'],
            ['url', 'unique'],
            ['url', UrlValidator::className() ],
        ];
    }



    public static function table_chema( $migration )
    {
        return [

            'id' => $migration->primaryKey()->unsigned(),
            'name' => $migration->string(255)->notNull(),
            'url' => $migration->string(255)->notNull(),
            'content' => $migration->longText()->notNull(),
            'created_at' => $migration->datetime()->notNull(),
            'updated_at' => $migration->datetime()->notNull(),
            'deleted_at' => $migration->datetime(),
            'removed' => $migration->boolean()->notNull(),
            'deleted' => $migration->boolean()->notNull(),
        ];
    }

    public function customLabels()
    {
        return [];
    }

}


