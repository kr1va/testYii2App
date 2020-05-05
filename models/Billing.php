<?php


namespace app\models;


use yii\db\ActiveRecord;

class Billing extends ActiveRecord
{

    public static function tableName()
    {
        return 'billing';
    }

    public function rules()
    {
        return [
            [['user_id', 'amount'], 'required'],
            [['user_id', 'amount'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'billing_id' => 'ID',
            'user_id' => 'ID Пользователя',
            'amount' => 'Сумма',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}