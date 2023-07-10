<?php

/*
|--------------------------------------------------------------------------
| Footer Menu JSON Data
|--------------------------------------------------------------------------
*/

Event::listen('footer.tree', function($footer)
{
	if ($footer->parent_id == 0) {
		$subLink = Footer::where('parent_id','=',$footer->id_menu)->orderBy('sort','ASC')->select('id_menu','name','url')->get();
    	$footer->tree = json_encode(array('menu'=>$subLink));
    	$footer->save();		
    }
    else {
		$subLink = Footer::where('parent_id','=',$footer->parent_id)->orderBy('sort','ASC')->select('id_menu','name','url')->get();
		$main = Footer::findOrFail($footer->parent_id);
    	$main->tree = json_encode(array('menu'=>$subLink));
    	$main->save();
    }

});

/*
|--------------------------------------------------------------------------
| Administrator Log
|--------------------------------------------------------------------------
*/

Event::listen('administrator.logs', function($process_text)
{
    $log = new UserLog;
    $log->process_text = $process_text;
    $log->ip = $_SERVER['REMOTE_ADDR'];
    $log->user_email = Auth::user()->email;
    $log->user_id = Auth::user()->id_user;
    $log->process_at = date('Y-m-d H:i:s');
    $log->save();
});