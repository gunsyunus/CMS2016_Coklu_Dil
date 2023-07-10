<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('users_a', function(Blueprint $table)
		{
			$table->increments('id_user');
            $table->string('email',75);
            $table->string('password',100);
            $table->string('name',50);
            $table->string('surname',50);
            $table->smallInteger('role')->default('2');
            $table->timestamps();
            $table->rememberToken();
		});
	}

	public function down()
	{
       Schema::drop('users_a');
	}

}
