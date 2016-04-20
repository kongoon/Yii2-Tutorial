<?php

use yii\db\Migration;

class m160411_160737_create_transaction_paypal extends Migration
{
    public function up()
    {
        $this->createTable('transaction_paypal', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'payment_id' => $this->string(100),
            'hash' => $this->string(100),
            'complete' => $this->integer(1),
            'create_time' => $this->string(50),
            'update_time' => $this->string(50),
            'product_id' => $this->integer(11)
        ]);
    }

    public function down()
    {
        $this->dropTable('transaction_paypal');
    }
}
