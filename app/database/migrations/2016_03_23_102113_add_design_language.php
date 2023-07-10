<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesignLanguage extends Migration {

	public function up()
	{
		Schema::table('designs', function(Blueprint $table)
		{
            $table->smallInteger('language_id')->default(1);

		});
	}

	public function down()
	{
		Schema::table('designs', function(Blueprint $table)
		{
            $table->dropColumn('language_id');
		});
	}
	
}
