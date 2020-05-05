<?php

use yii\db\Schema;
use yii\db\Migration;

class m200505_202236_Mass extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable('{{%billing}}', [
            'billing_id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->null()->defaultValue(null),
            'amount' => $this->decimal(11, 2)->null()->defaultValue(null),
        ], $tableOptions);

        $this->createIndex('user_id', '{{%billing}}', ['user_id'], false);

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(11),
            'user_name' => $this->string(100)->notNull(),
            'user_address' => $this->string(255)->null()->defaultValue(null),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_billing_user_id',
            '{{%billing}}', 'user_id',
            '{{%users}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->batchInsert('{{%users}}',
            ["user_name", "user_address"],
            [
                [

                    'user_name' => 'Борис Тихий',
                    'user_address' => 'ул. Глухая, 23',
                ],
                [

                    'user_name' => 'Андрей Высокий',
                    'user_address' => 'пер. Низкий, 22',
                ],
                [

                    'user_name' => 'Дмитрий Глянец',
                    'user_address' => 'ул. Матовая, 21',
                ],
                [

                    'user_name' => 'Павел Умный',
                    'user_address' => 'ул. Кривая, 20',
                ],
                [

                    'user_name' => 'Федор Добрый',
                    'user_address' => 'пер. Терпимости, 19',
                ],
                [

                    'user_name' => 'Аркадий Пустой',
                    'user_address' => 'ул. Половинная, 18',
                ],
                [

                    'user_name' => 'Никодим Хороший',
                    'user_address' => 'ул. им. Неправды, 17',
                ],
                [

                    'user_name' => 'Александр Холостой',
                    'user_address' => 'ул. им. Любви, 16',
                ],
            ]
        );

        $this->batchInsert('{{%billing}}',
            ["billing_id", "user_id", "amount"],
            [
                [
                    'billing_id' => '1',
                    'user_id' => '1',
                    'amount' => '20.12',
                ],
                [
                    'billing_id' => '2',
                    'user_id' => '1',
                    'amount' => '2220.74',
                ],
                [
                    'billing_id' => '3',
                    'user_id' => '1',
                    'amount' => '35.40',
                ],
                [
                    'billing_id' => '4',
                    'user_id' => '2',
                    'amount' => '1135.03',
                ],
                [
                    'billing_id' => '5',
                    'user_id' => '2',
                    'amount' => '5.99',
                ],
                [
                    'billing_id' => '6',
                    'user_id' => '2',
                    'amount' => '195.32',
                ],
                [
                    'billing_id' => '7',
                    'user_id' => '3',
                    'amount' => '117.07',
                ],
                [
                    'billing_id' => '8',
                    'user_id' => '3',
                    'amount' => '1000.00',
                ],
                [
                    'billing_id' => '9',
                    'user_id' => '3',
                    'amount' => '1.66',
                ],
                [
                    'billing_id' => '10',
                    'user_id' => '4',
                    'amount' => '992.15',
                ],
                [
                    'billing_id' => '11',
                    'user_id' => '5',
                    'amount' => '442.96',
                ],
                [
                    'billing_id' => '12',
                    'user_id' => '5',
                    'amount' => '1104.32',
                ],
                [
                    'billing_id' => '13',
                    'user_id' => '5',
                    'amount' => '1.52',
                ],
                [
                    'billing_id' => '14',
                    'user_id' => '6',
                    'amount' => '22.22',
                ],
                [
                    'billing_id' => '15',
                    'user_id' => '6',
                    'amount' => '1000.00',
                ],
                [
                    'billing_id' => '16',
                    'user_id' => '7',
                    'amount' => '231.32',
                ],
                [
                    'billing_id' => '17',
                    'user_id' => '7',
                    'amount' => '2231.87',
                ],
            ]
        );


    }


    public function safeDown()
    {
        $this->dropForeignKey('fk_billing_user_id', '{{%billing}}');
        $this->dropTable('{{%billing}}');
        $this->dropTable('{{%users}}');
    }
}
