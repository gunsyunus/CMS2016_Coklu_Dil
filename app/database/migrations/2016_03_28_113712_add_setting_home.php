<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingHome extends Migration {

	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->string('home_name',100);
            $table->string('search_name',100);
		});
	}

	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->dropColumn('home_name');
            $table->dropColumn('search_name');
		});
	}

}
