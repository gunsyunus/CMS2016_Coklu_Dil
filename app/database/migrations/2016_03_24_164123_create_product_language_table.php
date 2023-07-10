<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLanguageTable extends Migration {

	public function up()
	{
		Schema::create('products_language', function(Blueprint $table)
		{
                  $table->increments('id');                  
                  $table->string('name',175);
                  $table->string('title',70);
                  $table->string('keyword',260);
                  $table->string('description',160);
                  $table->string('promotion_text',15);
                  $table->text('content');
                  $table->string('short_content',250);
                  $table->string('sef_url',200);
                  $table->integer('product_id');
                  $table->smallInteger('language_id')->default(1);            
		});
	}

	public function down()
	{
       Schema::drop('products_language');
	}

}
