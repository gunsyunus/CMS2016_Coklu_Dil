<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id_menu');
            $table->string('name',75);
            $table->string('url',175)->default('#');
            $table->smallInteger('sort');                        
            $table->string('image',175);
            $table->string('status',1);
            $table->string('type',25);
            $table->integer('parent_id');
            $table->text('tree');
		});
	}

	public function down()
	{
       Schema::drop('menus');
	}

}
