<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingSearch extends Migration {

	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
 	        $table->string('search_type',1)->default('1');
		});
	}

	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->dropColumn('search_type');
		});
	}

}
