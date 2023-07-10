<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLanguageTable extends Migration {

	public function up()
	{
		Schema::create('categories_language', function(Blueprint $table)
		{
		      	  $table->increments('id');            
                  $table->string('name',100);
                  $table->string('sef_url',175);
                  $table->string('title',70);
                  $table->string('keyword',260);
                  $table->string('description',160);
                  $table->integer('category_id');
                  $table->smallInteger('language_id')->default(1);
		});
	}

	public function down()
	{
       Schema::drop('categories_language');
	}

}
