<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meal_opening_days".
 *
 * @property int $id
 * @property int $meal_id
 * @property string $day_name
 * @property string $start_time
 * @property string $end_time
 * @property string $created_at
 *
 * @property Meals $meal
 */
class MealOpeningDays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meal_opening_days';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meal_id', 'day_name', 'start_time', 'end_time'], 'required'],
            [['meal_id'], 'integer'],
            [['start_time', 'end_time', 'created_at'], 'safe'],
            [['day_name'], 'string', 'max' => 15],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meals::className(), 'targetAttribute' => ['meal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meal_id' => 'Meal ID',
            'day_name' => 'Day Name',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_at' => 'Created At',
        ];
    }


    // public function relations(){
    //     return array(
    //         'mealName'=>array(self::BELONG,'meals','meal_id')
    //     );
    // }

    
    public function meal()
    {
        return $this->hasOne(Meals::class, 'meal_id', 'id');
    }

    public function meals(){
        return Meals::find()->all();
    }

    public function checkMealOpening($mealId){
        $currentTime =  date('H:i');
        $currentDay =  strtolower(date('l'));
        $openingTime =
        $this->findOne(['meal_id' => $mealId,'day_name'=>$currentDay]);
        if($openingTime){
            $startTime  = date('H:i', strtotime($openingTime->start_time));
            $endTime  = date('H:i', strtotime($openingTime->end_time));
            if ($currentTime > $startTime && $currentTime < $endTime) {
                return true;
            }
        }
        return false;

        
    }
    

    /**
     * Gets query for [[Meal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meals::className(), ['id' => 'meal_id']);
    }
}
