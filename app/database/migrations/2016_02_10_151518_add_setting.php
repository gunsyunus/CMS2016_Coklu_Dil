<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSetting extends Migration {
	
	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->string('contact_title_left',100);
            $table->string('contact_title_right',100);
			$table->text('contact_map');
			$table->text('contact_info');
		});
	}

	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
            $table->dropColumn('contact_title_left');
            $table->dropColumn('contact_title_right');			
			$table->dropColumn('contact_map');
			$table->dropColumn('contact_info');
		});
	}

}
