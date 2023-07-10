<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageLanguageTable extends Migration {

	public function up()
	{
		Schema::create('pages_language', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title',70);
            $table->string('keyword',260);
            $table->string('description',160);
			$table->text('content');
            $table->string('sef_url',150);
            $table->integer('page_id');
            $table->smallInteger('language_id')->default(1);
		});
	}

	public function down()
	{
       Schema::drop('pages_language');
	}

}
