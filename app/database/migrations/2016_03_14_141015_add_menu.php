<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenu extends Migration {

	public function up()
	{
		Schema::table('menus', function(Blueprint $table)
		{
            $table->smallInteger('language_id')->default(1);

		});
	}

	public function down()
	{
		Schema::table('menus', function(Blueprint $table)
		{
            $table->dropColumn('language_id');
		});
	}

}
