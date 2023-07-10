<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id_page');
            $table->smallInteger('sort');            
 	        $table->string('status',1)->default('0');
            $table->integer('section_id'); 	        
		});
	}

	public function down()
	{
       Schema::drop('pages');
	}

}
