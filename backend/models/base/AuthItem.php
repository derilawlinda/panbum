<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\models\AuthAssignment[] $authAssignments
 * @property \backend\models\AuthRule $ruleName
 * @property \backend\models\AuthItemChild[] $authItemChildren
 */
class AuthItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(\backend\models\AuthAssignment::className(), ['item_name' => 'name']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(\backend\models\AuthRule::className(), ['name' => 'rule_name']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(\backend\models\AuthItemChild::className(), ['child' => 'name']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\AuthItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AuthItemQuery(get_called_class());
    }
}
