<?php

class SettingTableSeeder extends Seeder {

	public function run()
	{
		Setting::create(['title'=>'CMS',
					  'keyword'=>'CMS',
					  'description'=>'CMS',
					  'copyright'=>'2015 CMS',
 					  'welcome_msg'=>'CMS' 
					  ]);
	}

}
