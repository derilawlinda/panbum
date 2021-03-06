<?php

namespace backend\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

/**
 * This is the model class for table "user".
 */
class RegistrationForm extends BaseRegistrationForm
{
    /**
         * @var string
         */
        public $captcha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255]
        ]);
    }
    
    
	
}
