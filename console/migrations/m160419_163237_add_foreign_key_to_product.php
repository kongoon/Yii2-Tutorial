<?php

use yii\db\Migration;

class m160419_163237_add_foreign_key_to_product extends Migration
{
    public function up()
    {
        // creates index for column `category_id`
        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
            );
        
        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
            );
    }

    public function down()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-product-category_id',
            'product'
            );
        
        // drops index for column `category_id`
        $this->dropIndex(
            'idx-product-category_id',
            'product'
            );
    }
}
