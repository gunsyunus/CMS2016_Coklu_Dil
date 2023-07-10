<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingLanguage extends Migration {

	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->smallInteger('language_id')->default(1);

		});
	}

	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->dropColumn('language_id');
		});
	}

}
