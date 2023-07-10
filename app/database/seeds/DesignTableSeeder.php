<?php

class DesignTableSeeder extends Seeder {

	public function run()
	{

		$menu = array(
    		array('name'=>'MENÜ - 1','sort'=>'1','status'=>'1','tree'=>'{"menu":[]}'),
    		array('name'=>'MENÜ - 2','sort'=>'2','status'=>'1','tree'=>'{"menu":[]}'),
    		array('name'=>'MENÜ - 3','sort'=>'3','status'=>'1','tree'=>'{"menu":[]}'),
		);

		Footer::insert($menu);

		Design::create(['logo'=>'logo.png']);		

	}

}
