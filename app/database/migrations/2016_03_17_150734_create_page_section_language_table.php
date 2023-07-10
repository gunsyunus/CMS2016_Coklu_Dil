<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionLanguageTable extends Migration {

	public function up()
	{
		Schema::create('pages_section_language', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
            $table->integer('section_id');
            $table->smallInteger('language_id')->default(1);
		});
	}

	public function down()
	{
       Schema::drop('pages_section_language');
	}

}
