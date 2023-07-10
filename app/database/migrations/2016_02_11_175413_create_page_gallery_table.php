<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageGalleryTable extends Migration {

	public function up()
	{
		Schema::create('pages_gallery', function(Blueprint $table)
		{
			$table->increments('id_gallery');
            $table->string('name',100);
            $table->string('type',25);            
		});
	}

	public function down()
	{
       Schema::drop('pages_gallery');
	}

}
