<?php

use yii\db\Migration;
use Faker\Factory;

class m160419_160008_create_category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
        
        $columns = array('id',
            'name',
        );
        $values = [];
        
        for($i=1; $i<=10; $i++){
            $facker = Factory::create();
        
            $values[] = [
                $i,
                $facker->sentence,
            ];
        }
        
        $this->batchInsert('category', $columns, $values);
    }
    
    

    public function down()
    {
        $this->dropTable('category');
    }
}
