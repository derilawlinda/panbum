<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * @property \backend\models\Pltp[] $pltps
 * @property \backend\models\Profile $profile
 * @property \backend\models\SocialAccount[] $socialAccounts
 * @property \backend\models\Token[] $tokens
 */
class User extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $userpltp;
    public $nama_pltp;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags'], 'integer'],
            [['username', 'email', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['username'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'confirmed_at' => 'Confirmed At',
            'unconfirmed_email' => 'Unconfirmed Email',
            'blocked_at' => 'Blocked At',
            'registration_ip' => 'Registration Ip',
            'flags' => 'Flags',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPltps()
    {
        return $this->hasMany(\backend\models\Pltp::className(), ['id_user' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(\backend\models\Profile::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(\backend\models\SocialAccount::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(\backend\models\Token::className(), ['user_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserQuery(get_called_class());
    }
}
