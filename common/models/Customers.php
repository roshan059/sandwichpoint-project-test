<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $email
 * @property string $mobile_number
 * @property string $token
 * @property string $created_at
 * @property string $status
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'mobile_number'], 'required'],
            [['created_at'], 'safe'],
            [['status'], 'string'],
            [['full_name', 'email', 'mobile_number', 'token'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'mobile_number' => 'Mobile Number',
            'token' => 'Token',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    public function isUserValidToken($token)
    {
        $user = $this->findOne(['token' => $token]);
        if ($user) {
            return true;
        }
        return false;
    }

    public function newSave(){

  
        $customer = new Customers();
        $customer->full_name = $this->full_name;
    
        $customer->email = $this->email;
        $customer->mobile_number = $this->mobile_number;
        $customer->token = substr(sha1(mt_rand(1, 90000) . 'SALT'),0,10);
        $customer->status = $this->status;
        return $customer->save(false);
    }
}
