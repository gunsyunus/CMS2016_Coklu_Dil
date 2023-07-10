<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionTable extends Migration {

	public function up()
	{
		Schema::create('pages_section', function(Blueprint $table)
		{
			$table->increments('id_section');
		});
	}

	public function down()
	{
       Schema::drop('pages_section');
	}

}
