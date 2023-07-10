<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id_category');            
                  $table->smallInteger('sort')->default('9999');
            	$table->integer('parent_id')->nullable()->index();
      	      $table->integer('lft')->nullable()->index();
      	      $table->integer('rgt')->nullable()->index();
      	      $table->integer('depth')->nullable();
                  $table->timestamps(); 
		});
	}

	public function down()
	{
       Schema::drop('categories');
	}

}
