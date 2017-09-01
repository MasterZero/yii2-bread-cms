<?php
namespace common\modules\user\models;

use yii\base\Model;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $is_root;
    public $password;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'unique', 
                'targetClass' => '\common\modules\user\models\User',
                'message' => 'This username has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['is_root','boolean'],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 
                'targetClass' => '\common\modules\user\models\User', 
                'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            //['password', 'string', 'min' => 4],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->is_root = $this->is_root;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }


    public function attributeLabels()
    {
        return [ 
            'name' => 'Логин',
            'password' => 'Пароль',
            'captcha' => 'Код с картинки',
            'is_root' => 'root-Админ',
        ];   
    }

    
}
