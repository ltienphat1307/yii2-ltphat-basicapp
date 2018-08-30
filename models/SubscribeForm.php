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
    public $firsName;
    public $lastName;
    public $email;
    public $state;
    public $userType;
    public $devInterest;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['firsName', 'lastName', 'email', 'state'], 'required',],
            ['email', 'email'],
            [['userType', 'devInterest'], 'safe']
        ];
    }    
}
