<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property int $meal_id
 * @property int|null $bread_id
 * @property string $bread_size
 * @property int $is_baked
 * @property int|null $sandwich_taste_id
 * @property string|null $extra
 * @property int|null $vegetable_id
 * @property int $sauce_id
 * @property string $status
 * @property string $location
 * @property string $order_at
 */
class Orders extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'meal_id', 'bread_size', 'bread_id', 'is_baked', 'sandwich_taste_id', 'sauce_id', 'location', 'vegetable_id'], 'required'],
            [['id', 'user_id', 'meal_id', 'bread_id', 'sandwich_taste_id', 'vegetable_id', 'sauce_id'], 'integer'],
            [['status', 'is_baked'], 'string'],
            [['order_at'], 'safe'],
            [['bread_size'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'meal_id' => 'Meal ID',
            'bread_id' => 'Bread ID',
            'bread_size' => 'Bread Size',
            'is_baked' => 'Is Baked',
            'sandwich_taste_id' => 'Sandwich Taste ID',
            'extra' => 'Extra',
            'vegetable_id' => 'Vegetable ID',
            'sauce_id' => 'Sauce ID',
            'status' => 'Status',
            'location' => 'Location',
            'order_at' => 'Order At',
            'meals.title' => 'Meal',
            'bread.title' => 'Bread',
            'customer.full_name'=>'Customer Name'
        ];
    }

    public function takeOrder($id, $token)
    {
     
        $customer =  Customers::findOne(['token' => $token]);
           
        $order = new Orders();
        $order->user_id = $customer->id;
        $order->meal_id = $id;
        $order->bread_id = $this->bread_id;
        $order->bread_size = $this->bread_size;
        $order->is_baked = $this->is_baked;
        $order->sandwich_taste_id = $this->sandwich_taste_id;
        $order->extra = 'dasdas';
        $order->vegetable_id = $this->vegetable_id;
        $order->sauce_id = $this->sauce_id;
        $order->status = $this->status;
        $order->location = $this->location;
        $order->status = 'open';
      
      

        return $order->save(false);
    }

    public function customerLastOrder($token){
        $customer =  Customers::findOne(['token' => $token]);
        return $this->findOne(['user_id'=> $customer->id]);

    }

    public function getCustomerOrderHistory($token){
        $customer =  Customers::findOne(['token' => $token]);
        return $this->find()->where(['user_id' => $customer->id])->all();

    }

    public function getOrder($id, $token){
        $customer =  Customers::findOne(['token' => $token]);
        return $this->findOne(['id' => $id, 'user_id' => $customer->id]);
    }

    public function getBread()
    {

        return $this->hasOne(Bread::className(), ['id' => 'bread_id']);
    }

    public function getMeals()
    {

        return $this->hasOne(Meals::className(), ['id' => 'meal_id']);
    }

    public function getTaste()
    {

        return $this->hasOne(Taste::className(), ['id' => 'sandwich_taste_id']);
    }

    public function getVegetable()
    {

        return $this->hasOne(Vegetable::className(), ['id' => 'vegetable_id']);
    }
    public function getSauce()
    {

        return $this->hasOne(Sauce::className(), ['id' => 'sauce_id']);
    }

    public function getCustomer()
    {

        return $this->hasOne(Customers::className(), ['id' => 'user_id']);
    }

    public function updateOrder($id){
        $order = $this->findOne($id);
        $order->bread_id = $this->bread_id;
        $order->bread_size = $this->bread_size;
        $order->is_baked = $this->is_baked;
        $order->sandwich_taste_id = $this->sandwich_taste_id;
        $order->extra = 'dasdas';
        $order->vegetable_id = $this->vegetable_id;
        $order->sauce_id = $this->sauce_id;
        $order->status = $this->status;
        $order->location = $this->location;
        $order->status = 'open';



        return $order->save(false);
    }
}
