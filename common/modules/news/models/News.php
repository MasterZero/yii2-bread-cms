<?php

namespace common\modules\news\models;


use \common\components\UrlValidator;

class News extends \common\components\ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function customRules()
    {
        return [
            [['name', 'url', 'content','image'], 'required'],
            [['name', 'url','image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            //[['removed','deleted'], 'boolean'],
            ['url', 'unique'],
            ['category_id', 'exist' ,
                'targetClass'=> static::getCategoryName(),
                'targetAttribute' => 'id'],
            ['url', UrlValidator::className() ],
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
            'category_id' => $migration->integer()->unsigned()->notNull(),


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


