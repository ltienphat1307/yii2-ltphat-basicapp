<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SubscribeForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $state;
    public $user_type;
    public $dev_interest;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'state'], 'required',],
            ['email', 'email'],
            [['user_type', 'dev_interest'], 'safe']
        ];
    }    
}
