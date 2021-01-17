<?php

namespace backend\controllers;

use common\models\Bread;
use common\models\Sauce;
use common\models\Taste;
use common\models\Vegetable;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class DashboardController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    // this function will fetch latest added sandwich tastes(one week ago) from database and shows to admmin
    private function getLatestSandwichTastes()
    {
        $fetchlatestSandwichTastes = [];
        try {
            $fetchlatestSandwichTastes  = Taste::find()->where(['status' => 'active'])->orderBy('created_at', 'DESC')->all();
            return $fetchlatestSandwichTastes;
        } catch (\Throwable $th) {
            //return null data if it throws error
            return $fetchlatestSandwichTastes;
        }
    }
     // this function will fetch latest added sauces(one week ago) from database and shows to admmin
    private function getLatestSauces()
    {
        $fetchlatestSauces = [];
        try {
            $fetchlatestSauces  = Sauce::find()->where(['status' => 'active'])->orderBy('created_at', 'DESC')->all();
            return $fetchlatestSauces;
        } catch (\Throwable $th) {
            //return null data if it throws error
            return $fetchlatestSauces;
        }
    }
     // this function will fetch latest added breads(one week ago) from database and shows to admmin
    private function getLatestBreads()
    {
        $fetchlatestBreads = [];
        try {
            $fetchlatestBreads  = Bread::find()->where(['status' => 'active'])->orderBy('created_at', 'DESC')->all();
            return $fetchlatestBreads;
        } catch (\Throwable $th) {
            //return null data if it throws error
            return $fetchlatestBreads;
        }
    }
     // this function will fetch latest added vegetables(one week ago) from database and shows to admmin
    private function getLatestVegetables()
    {
        $fetchlatestVegetables = [];
        try {
            $fetchlatestVegetables  = Vegetable::find()->where(['status' => 'active'])->orderBy('created_at', 'DESC')->all();
            return $fetchlatestVegetables;
        } catch (\Throwable $th) {
            //return null data if it throws error
            return $fetchlatestVegetables;
        }
    }

    private function getLatestUsers(){
        $fetchlatestUsers = [];
        try {
            $fetchlatestUsers  = User::find()->where(['status' =>10])->orderBy('created_at', 'DESC')->all();
            return $fetchlatestUsers;
        } catch (\Throwable $th) {
            //return null data if it throws error
            return $fetchlatestUsers;
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // \yii\helpers\VarDumper::dump($this->getLatestVegetables());die();
        $fetchlatestBreads =  $this->getLatestBreads(); //return latest breads (one week ago) data
        $fetchlatestSauces =  $this->getLatestSauces(); //return latest sauces (one week ago) data
        $fetchlatestSandwichTastes =  $this->getLatestSandwichTastes(); //return latest sandwich tastes (one week ago) data
        $fetchlatestVegetables =  $this->getLatestVegetables(); //return latest vegetables (one week ago) data
        $fetchlatestUsers = $this->getLatestUsers();
        return $this->render('index',[
            'latestBreads'=> $fetchlatestBreads,
            'latestSauces' => $fetchlatestSauces,
            'latestSandwichTastes' => $fetchlatestSandwichTastes,
            'latestVegetables' => $fetchlatestVegetables,
            'latestUsers'=> $fetchlatestUsers
        ]); //will render view with given data
    }
}
