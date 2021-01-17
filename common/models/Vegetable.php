<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vegetable".
 *
 * @property int $id
 * @property string $title
 * @property string $status
 * @property string $created_at
 */
class Vegetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vegetables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 150],
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
            'created_at' => 'Created At',
        ];
    }
}
