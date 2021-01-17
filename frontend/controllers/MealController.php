<?php

namespace frontend\controllers;

use common\models\Bread;
use common\models\Customers;
use common\models\MealOpeningDays;
use common\models\Meals;
use common\models\Orders;
use frontend\models\TakeOrderForm;
use Yii;

class MealController extends \yii\web\Controller
{
    public function actionHistory($token=''){

        if($token==''){
            return $this->render('historypopup');
        }
        $order = new Orders();
        $getCustomerOrderHistory =  $order->getCustomerOrderHistory($token);
      
        return $this->render('userhistory',['getCustomerOrderHistory'=> $getCustomerOrderHistory,'token'=>$token]);
    }
    public function actionIndex($id,$token)
    {
        $order = new Orders();
  
      
        
        if ($order->load(Yii::$app->request->post()) && $order->takeOrder($id,$token)) {
            Yii::$app->session->setFlash('success', 'Your order has been successfully received please wait 30 mins.');

            return $this->goHome();
        }
       else{
            $customer =  new Customers();
            $isUser =  $customer->isUserValidToken($token);
            if ($isUser) {
                $meal =  new Meals();
                $mealOpening =  new MealOpeningDays();
                $bread = new Bread();
                $mealStatus = $meal->checkMealStatus($id);
                $checkMealOpening = $mealOpening->checkMealOpening($id);
                $getSelectedmeal = $meal->getSelectedmeal($id);
                if (!$mealStatus || !$checkMealOpening) {
                    Yii::$app->session->setFlash('success', $getSelectedmeal->title  . ' is closed right now please order another meal.');

                    return $this->goHome();
                }
                $getSelectedmeal = $meal->getSelectedmeal($id);
                $getAllActiveBreads = $bread->getAllActiveBreads();

                $customerLastOrder = $order->customerLastOrder($token);
             
                if($customerLastOrder){
                    if ($customerLastOrder->status == 'open') {
                        Yii::$app->session->setFlash('error', 'Your last order is still open please wait till it to closed.');
                        return $this->goHome();
                    }else{
                        Yii::$app->session->setFlash('success', 'your last ordered meal is here.');
                    }
                }
                return $this->render('index', [
                    'order' => $customerLastOrder? $customerLastOrder:$order,
                    'meal' => $getSelectedmeal,
                    'breads' => $getAllActiveBreads
                ]);
            } else {
                Yii::$app->session->setFlash('error', 'this user is not vaild for our system please contact with sandwich point.');

                return $this->goHome();
            }
       }
      
    }

    public function actionEditOpenOrder($id,$token){
        $order = new Orders();
        $order  = $order->getOrder($id,$token);
       if($order){
           if($order->status=='closed'){
                Yii::$app->session->setFlash('error', 'You dont have permission to edit this order beacuse this our is closed now.');

               return  $this->redirect(['meal/history', 'id' => $order->meal_id, 'token' => $token]);
           }else{

                if ($order->load(Yii::$app->request->post()) && $order->updateOrder($order->id)) {
                    Yii::$app->session->setFlash('success', 'Successfully Updated');
                    return  $this->redirect(['meal/history', 'id' => $order->meal_id, 'token' => $token]);

                }
                return $this->render('editorder', [
                    'order' => $order,
                    'token'=>$token

                ]);
           }
          
       }else{
            Yii::$app->session->setFlash('error', 'Sorry we didnot have this type of order.');

            return $this->goHome();
       }
    }

  

}
