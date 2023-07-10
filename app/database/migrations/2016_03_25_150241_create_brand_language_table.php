<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandLanguageTable extends Migration {

	public function up()
	{
		Schema::create('brands_language', function(Blueprint $table)
		{
		      	  $table->increments('id');            
                  $table->string('title',70);
                  $table->string('keyword',260);
                  $table->string('description',160);
                  $table->integer('brand_id');
                  $table->smallInteger('language_id')->default(1);
		});
	}

	public function down()
	{
       Schema::drop('brands_language');
	}

}
