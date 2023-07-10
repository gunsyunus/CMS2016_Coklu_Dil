<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration {

	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id_banner');
            $table->string('image',175);
            $table->smallInteger('sort');
            $table->string('status',1);
            $table->string('type',25);
            $table->integer('category_id');
		});
	}

	public function down()
	{
       Schema::drop('banners');
	}

}
