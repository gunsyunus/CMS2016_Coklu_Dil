<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration {

	public function up()
	{
		Schema::create('brands', function(Blueprint $table)
		{
			$table->increments('id_brand');
            $table->string('bname',100);
            $table->string('title',70);
            $table->string('keyword',260);
            $table->string('description',160);
            $table->string('sef_url',200);
            $table->timestamps();
		});
	}

	public function down()
	{
       Schema::drop('brands');
	}

}
