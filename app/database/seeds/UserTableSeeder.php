<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(['email'=>'admin@admin.com',
					  'password'=>'admin123',
					  'name'=>'administrator',
					  'surname'=>'',
					  'role'=>1]);
	}

}
