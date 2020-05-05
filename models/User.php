<?php


namespace app\models;


use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['user_id', 'user_name', 'user_address'], 'required'],
            [['user_id'], 'integer'],
            [['user_name', 'user_address'], 'string', 'max' => 255],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'Имя',
            'user_address' => 'Адресс',
            'amount' => 'Summa'

        ];
    }

    public function getBills()
    {
        return $this->hasMany(Billing::className(), ['user_id' => 'id']);
    }

    public function getMaxBill()
    {
        return Billing::find()->andWhere(['user_id' => $this->id])->orderBy(['amount' => SORT_DESC])->asArray()->all();
    }


}