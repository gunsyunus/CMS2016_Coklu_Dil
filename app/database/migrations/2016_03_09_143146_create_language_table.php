<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration {

	public function up()
	{
		Schema::create('languages', function(Blueprint $table)
		{
			$table->increments('id_language');
            $table->string('name',50);
            $table->string('language_code',2);
            $table->string('country_code',6);
            $table->string('image_flag',175);
            $table->smallInteger('sort');            
            $table->string('status',1)->default('0');
            $table->timestamps();
		});
	}

	public function down()
	{
       Schema::drop('languages');
	}

}
