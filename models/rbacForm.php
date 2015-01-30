<?php

namespace fourteenmeister\rbac\models;

use fourteenmeister\core\components\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 *
 * @property integer $name
 */

class rbacForm extends ActiveRecord
{
    
    public $parent;

    public static function tableName()
    {
        return \Yii::$app->authManager->itemTable;
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['type', 'name', 'description'], 'required'],
            ['parent', 'exist', 'targetAttribute' => 'name'],
            ['name', 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'type' => 'тип',
            'parent' => 'родитель',
            'description' => 'описание',
            'name' => 'наименование',
        ];
    }

    public function afterFind()
    {
        parent::afterFind();        
        $parent = (new \yii\db\Query())
            ->select('parent')
            ->where(['child' => $this->name])
            ->from(\Yii::$app->authManager->itemChildTable)
            ->scalar();
        if($parent)
            $this->parent = $parent;
    }

}

?>