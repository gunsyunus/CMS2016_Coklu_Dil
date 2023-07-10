<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageGalleryPhotoTable extends Migration {

	public function up()
	{
		Schema::create('pages_gallery_photo', function(Blueprint $table)
		{
			$table->increments('id_photo');
            $table->string('image_small',175);
            $table->string('image_big',175);
            $table->integer('gallery_id');
		});
	}

	public function down()
	{
       Schema::drop('pages_gallery_photo');
	}

}
