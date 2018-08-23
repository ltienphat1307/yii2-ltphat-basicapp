<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
 //    public $id;
	// public $email;
	// public $password;
	// public $authKey;
	// public $accessToken;

	public static function findIdentity($id) {
	    $user = self::find()
	            ->where([
	                "id" => $id
	            ])
	            ->one();
	    if (!$user) {
	        return null;
	    }
	    return new static($user);
	}
	
	public static function findByEmail($email) {
	    $user = self::find()
	            ->where([
	                "email" => $email
	            ])->one();

	    return $user;
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $userType = null) {
	 
	    $user = self::find()
	            ->where(["accessToken" => $token])
	            ->one();
	    if (!count($user)) {
	        return null;
	    }
	    return new static($user);
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
	    return $this->id;
	}
	 
	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
	    return $this->authKey;
	}
	 
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
	    return $this->authKey === $authKey;
	}

	/**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
