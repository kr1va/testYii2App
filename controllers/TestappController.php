<?php

namespace app\controllers;

use app\models\Billing;
use app\models\User;
use Yii;
use yii\web\Controller;

class TestappController extends Controller
{

    public function actionIndex()
    {
        $this->view->title = 'Test Yii2 App';
        $request = Yii::$app->getRequest();
        $billingTable = Billing::tableName();
        $builder = User::find()->innerJoin($billingTable, "$billingTable.user_id = id");
        if ($request->get('filter')) {
            $builder->andWhere(['>', 'amount', $request->get('filter')]);
        }
        $users = $builder->orderBy(["$billingTable.amount" => SORT_DESC])->all();
        return $this->render('index', compact('users'));
    }

}