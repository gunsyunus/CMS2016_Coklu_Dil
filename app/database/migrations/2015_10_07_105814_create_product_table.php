<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
		      $table->increments('id_product');
                  $table->string('code',100);
      	      $table->decimal('price',12,2);
		      $table->decimal('price_old',12,2);
                  $table->decimal('price_tier',12,2);
                  $table->smallInteger('tax');
                  $table->smallInteger('cargo_weight');
                  $table->string('supply_company_name',100);
                  $table->integer('stock');
                  $table->integer('stock_order');
                  $table->string('status',1)->default('0');
                  $table->string('option_status',1)->default('0');
                  $table->string('showcase_status',1)->default('0');
                  $table->string('private_status_1',1)->default('0');
                  $table->string('private_status_2',1)->default('0');
                  $table->string('private_status_3',1)->default('0');
                  $table->string('private_status_4',1)->default('0');
                  $table->string('private_status_5',1)->default('0'); 
                  $table->string('outlet_status',1)->default('0');
                  $table->smallInteger('showcase_sort')->default('9999');
                  $table->smallInteger('private_sort')->default('9999');
                  $table->smallInteger('category_sort')->default('9999');
                  $table->smallInteger('brand_sort')->default('9999');
                  $table->string('barcode_ean',13);
                  $table->string('barcode_upc',12);
   		      $table->string('barcode_jan',13);
   		      $table->string('shelf_code',50);
                  $table->string('image_small_1',175);
                  $table->string('image_small_2',175);
                  $table->string('image_big_1',175);
                  $table->string('image_big_2',175);
                  $table->string('rate_id',6);
                  $table->string('brand_id',6);
                  $table->string('category_id',6);
                  $table->timestamps();
		});
	}

	public function down()
	{
       Schema::drop('products');
	}

}
