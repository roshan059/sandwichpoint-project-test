<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "breads".
 *
 * @property int $id
 * @property string $title
 * @property string $status
 * @property string $created_at
 */
class Bread extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'breads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['status'], 'string'],
       
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
           
        ];
    }

    public function getAllActiveBreads(){
        return $this->find()->where(['status' => 'active'])->all();
    }
}
