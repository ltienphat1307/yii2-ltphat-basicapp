<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use app\models\User;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $name;
    public $confirmPassword;
    public $password;
    public $email;
    // public $rememberMe = true;

    private $_user;
    public $KEY = 'a-Nhan-dep-trai';

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'confirmPassword'], 'required', 'on' => 'resgister'],
            ['name', 'required', 'on' => 'update'],
            [['email', 'password'], 'required', 'on' => 'login'],
            ['email', 'email'],
            ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'on' => 'resgister'],
            [['password', 'confirmPassword'], 'safe', 'on' => 'update'],
            // ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => true, 'on' => 'update'],
        ];
    }

    public function register()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = md5($this->password . $this->KEY);
        try {
            $user->save();
            return ['success' => true];
        }
        catch(Exception $e){ 
            return ['success' => false, 'messageError' => 'Email is existing'];
        }
    }



    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $user = $this->getUser();
        if ($user && $user->validatePassword(md5($this->password . $this->KEY)) && Yii::$app->user->login($user, 3600 * 24 * 30)) {
            return ['success' => true];
        }

        return ['success' => false, 'messageError' => 'Email or Pasaword is incorrect'];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword(md5($this->password . $this->KEY))) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if (!$this->_user) {
            if ($this->email) {
                $this->_user = User::findByEmail($this->email);
            } else {
                $this->_user = User::findByEmail(Yii::$app->user->identity->email);
            }
        }

        return $this->_user;
    }
}
