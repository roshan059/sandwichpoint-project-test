<?php

namespace frontend\models;

use common\models\Customers;
use common\models\Orders;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class TakeOrderForm extends Model
{
  
    public $bread_id;
    public $bread_size;
    public $is_baked;
    public $sandwich_taste_id;
    public $extra;
    public $vegetable_id;
    public $sauce_id;
    public $status;
    public $location;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'meal_id', 'bread_size', 'bread_id', 'is_baked', 'sandwich_taste_id', 'sauce_id', 'location', 'vegetable_id'], 'required'],
            [['id', 'user_id', 'meal_id', 'bread_id', 'is_baked', 'sandwich_taste_id', 'vegetable_id', 'sauce_id'], 'integer'],
            [['status'], 'string'],
            [['order_at'], 'safe'],
            [['bread_size'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
   

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */

    // public function signup()
    // {
    //     if (!$this->validate()) {
    //         return null;
    //     }

    //     $user = new User();
    //     $user->username = $this->username;
    //     $user->email = $this->email;
    //     $user->setPassword($this->password);
    //     $user->generateAuthKey();
    //     $user->generateEmailVerificationToken();
    //     return $user->save() && $this->sendEmail($user);
    // }

    public function takeOrder($id,$token){
           if (!$this->validate()) {
            return null;
        }
        $customer =  Customers::findOne(['token',$token]);

        $order = new Orders();
        $order->user_id = $customer->id;
        $order->meal_id = $id;
        $order->bread_id = $this->bread_id;
        $order->bread_size = $this->bread_size;
        $order->is_baked = $this->is_baked;
        $order->sandwich_taste_id = $this->sandwich_taste_id;
        $order->extra =is_array($this->extra)?json_encode($this->extra): $this->extra;
        $order->vegetable_id = $this->vegetable_id;
        $order->sauce_id = $this->sauce_id;
        $order->status = $this->status;
        $order->location = $this->location;

        return $order->save();
    }
   
}
