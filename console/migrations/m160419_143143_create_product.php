<?php

use yii\db\Migration;
use Faker\Factory;

class m160419_143143_create_product extends Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'price' => $this->integer(),
            'status' => $this->integer(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        
        $columns = array('id',
            'category_id',
            'name',
            'description',
            'price',
            'status',
            'created_at',
            'updated_at'
        );
        $values = [];
        
        for($i=1; $i<=50; $i++){
            $facker = Factory::create();
            
            $values[] = [
                $i,
                rand(1,5),
                $facker->sentence,
                $facker->text,
                rand(500,5000),
                rand(0,1),
                time(),
                time(),
            ];
        }
        
        $this->batchInsert('product', $columns, $values);
    }

    public function down()
    {
        $this->dropTable('product');
    }
}
