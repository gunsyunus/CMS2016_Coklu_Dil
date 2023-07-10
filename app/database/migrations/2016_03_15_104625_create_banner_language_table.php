<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerLanguageTable extends Migration {

	public function up()
	{
		Schema::create('banners_language', function(Blueprint $table)
		{
         	$table->increments('id');
            $table->string('title',100);
            $table->string('url',175)->default('#');
            $table->string('text',200);
            $table->integer('banner_id');
            $table->smallInteger('language_id')->default(1);
		});
	}

	public function down()
	{
       Schema::drop('banners_language');
	}

}
