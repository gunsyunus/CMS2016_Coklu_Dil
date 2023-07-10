<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuFooterTable extends Migration {

	public function up()
	{
		Schema::create('menus_footer', function(Blueprint $table)
		{
			$table->increments('id_menu');
            $table->string('name',75);
            $table->string('url',175)->default('#');
            $table->smallInteger('sort');        
            $table->string('status',1);
            $table->integer('parent_id');
            $table->text('tree');
		});
	}

	public function down()
	{
       Schema::drop('menus_footer');
	}
}
