<?php

class LanguageTableSeeder extends Seeder {

	public function run()
	{
		Language::create(['name'=>'Türkçe',
					  	  'sort'=>'1',
					  	  'country_code'=>'tr-TR',
					  	  'status'=>1]);
	}

}
