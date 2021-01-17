<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meals".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $location
 * @property string $status
 * @property string $created_at
 *
 * @property MealOpeningDays[] $mealOpeningDays
 */
class Meals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'location'], 'required'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['description', 'location'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'location' => 'Location',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function checkMealStatus($id){
        //this function will check the meal status (open or closed) if closed it will return false and if open it will return true;
    
        $meal = $this->findOne(['id' => $id, 'status' => 'open']);
        if($meal){
            return true;
        }
        return false;
    }

    public function getSelectedmeal($id)
    {
        //this function will check the meal status (open or closed) if closed it will return false and if open it will return true;
        $meal = $this->findOne(['id' => $id, 'status' => 'open']);
       return $meal;
    }

    // public function isMealOpen($currentTime){
    //     $meal = $this->find()
    //     ->where(['between', 'date', "2014-12-31", "2015-02-31"])->all();
    // }

    /**
     * Gets query for [[MealOpeningDays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMealOpeningDays()
    {
        return $this->hasMany(MealOpeningDays::className(), ['meal_id' => 'id']);
    }

    
}
