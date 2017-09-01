<?php

namespace common\modules\news\models;


use \common\components\UrlValidator;
use creocoder\nestedsets\NestedSetsBehavior;

class NewsCategory extends \common\components\ActiveRecord
{
    public static function tableName()
    {
        return '{{%news_category}}';
    }

    public function customRules()
    {
        return [
            [['name', 'url', 'content','image'], 'required'],
            [['name', 'url','image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            //[['removed','deleted'], 'boolean'],
            ['url', 'unique'],
            ['url', UrlValidator::className() ],
        ];
    }

    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'depthAttribute' => 'depth',
            ],
        ];
    }



    public static function table_chema( $migration )
    {
        return [

            'id' => $migration->primaryKey()->unsigned(),
            'name' => $migration->string(255)->notNull(),
            'url' => $migration->string(255)->notNull(),
            'image' => $migration->string(255)->notNull(),
            'content' => $migration->longText()->notNull(),
            'description' => $migration->longText(),


            'tree' => $this->integer()->unsigned()->notNull(),
            'lft' => $this->integer()->unsigned()->notNull(),
            'rgt' => $this->integer()->unsigned()->notNull(),
            'depth' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string()->unsigned()->notNull(),

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


