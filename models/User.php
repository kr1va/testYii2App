<?php


namespace app\models;

use Yii;
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
            'amount' => 'Сумма'

        ];
    }

    public function getBills()
    {
        return $this->hasMany(Billing::className(), ['user_id' => 'id']);
    }

    public function getMaxBill()
    {
        $request = Yii::$app->getRequest();
        if ($request->get('filter') && $request->get('sign') && $request->get('sign') != '') {
            return Billing::find()->andWhere('user_id = :user_id AND amount ' . $request->get('sign') . ':filter', [':user_id' => $this->id, ':filter' => $request->get('filter')])->orderBy(['amount' => SORT_DESC])->asArray()->all();
        } else {
            return Billing::find()->andWhere(['user_id' => $this->id])->orderBy(['amount' => SORT_DESC])->asArray()->all();
        }
    }
    
}