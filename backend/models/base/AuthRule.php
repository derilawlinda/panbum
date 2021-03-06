<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "auth_rule".
 *
 * @property string $name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\models\AuthItem[] $authItems
 */
class AuthRule extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_rule';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'data' => 'Data',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems()
    {
        return $this->hasMany(\backend\models\AuthItem::className(), ['rule_name' => 'name']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\AuthRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AuthRuleQuery(get_called_class());
    }
}
