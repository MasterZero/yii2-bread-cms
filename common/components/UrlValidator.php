<?php


namespace common\components;


use yii\validators\Validator;

class UrlValidator extends Validator
{

    public function validateAttribute($model, $attribute)
    {
    	if( !preg_match('/^[a-zA-Z][a-zA-Z0-9-]{2,}$/i', $model->$attribute) )
			$this->addError($model, $attribute,
				'Поле должно состоять из букв английского алфавита, цифр и знака минуса (-).
                Поле должно начинаться только с буквы.
                Поле должно быть не менее 3 символов.');
        
    }
}

