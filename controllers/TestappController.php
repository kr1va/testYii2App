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
        if ($request->get('filter') && $request->get('sign')&& $request->get('sign') != '') {
            $builder->andWhere([$request->get('sign'), 'amount', $request->get('filter')]);
        } else {
           $builder;
        }
        $users = $builder->orderBy(["$billingTable.amount" => SORT_DESC])->all();
        return $this->render('index', compact('users'));
    }

}