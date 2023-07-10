<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPage extends Migration {

	public function up()
	{
		Schema::table('pages', function(Blueprint $table)
		{
            $table->integer('gallery_id');

		});
	}

	public function down()
	{
		Schema::table('pages', function(Blueprint $table)
		{
            $table->dropColumn('gallery_id');
		});
	}

}
