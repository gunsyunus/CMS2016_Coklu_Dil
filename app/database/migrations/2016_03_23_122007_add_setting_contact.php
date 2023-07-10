<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingContact extends Migration {

	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->string('contact_page_name',100);
		});
	}

	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->dropColumn('contact_page_name');
		});
	}

}
