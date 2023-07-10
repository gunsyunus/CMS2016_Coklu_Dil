<?php

class Panel_MenuController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Menu
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $menus = Menu::with('language')->where('parent_id','=','0')->orderBy('language_id','ASC')->orderBy('sort','ASC')->paginate(25);
		return View::make('panel.module.menu.index',compact('menus'));
	}

    public function getSub($id) {
        $parentMenu = Menu::findOrFail($id);
        $menus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->paginate(25);
        return View::make('panel.module.menu.sub',compact('menus','parentMenu'));
    }    

	public function getNew() {
        $languages = Language::orderBy('id_language','ASC')->lists('name','id_language');      
		return View::make('panel.module.menu.new',compact('languages')); 
	}

	public function postAdd() {

        $validator = Validator::make(Input::all(),Menu::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));	
    	}
		
        $menu = new Menu;
        $menu->name = Input::get('name');
        $menu->status = (Input::get('status')=='1') ? '1' : '0';
        $menu->url = Input::get('url');
        $menu->sort = Input::get('sort');
        $menu->type = Input::get('type');
        $menu->language_id = Input::get('language_id');
        if ($menu->type != 'single') $menu->tree = '{"menu":[]}';
        $menu->save();

        $id_menu = $menu->id_menu;

        switch ($menu->type) {
            case 'three':
                    $menus = array(
                             array('name'=>'Kategori - 1','url'=>'#','sort'=>'1','status'=>'1','parent_id'=>$id_menu),
                             array('name'=>'Kategori - 2','url'=>'#','sort'=>'2','status'=>'1','parent_id'=>$id_menu),
                             array('name'=>'Kategori - 3','url'=>'#','sort'=>'3','status'=>'1','parent_id'=>$id_menu),
                    );
                    Menu::insert($menus);
            break;
            case 'four':
                    $menus =  array(
                              array('name'=>'Kategori - 1','url'=>'#','sort'=>'1','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 2','url'=>'#','sort'=>'2','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 3','url'=>'#','sort'=>'3','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 4','url'=>'#','sort'=>'4','status'=>'1','parent_id'=>$id_menu),
                    );
                    Menu::insert($menus);
            break;
            case 'five':
                    $menus =  array(
                              array('name'=>'Kategori - 1','url'=>'#','sort'=>'1','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 2','url'=>'#','sort'=>'2','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 3','url'=>'#','sort'=>'3','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 4','url'=>'#','sort'=>'4','status'=>'1','parent_id'=>$id_menu),
                              array('name'=>'Kategori - 5','url'=>'#','sort'=>'5','status'=>'1','parent_id'=>$id_menu),                             
                    );
                    Menu::insert($menus);
            break;
        }

        if ($menu->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

    public function postSubadd() {

        $validator = Validator::make(Input::all(),Menu::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $menu = new Menu;
        $menu->name = Input::get('name');
        $menu->status = (Input::get('status')=='1') ? '1' : '0';
        $menu->url = Input::get('url');
        $menu->sort = Input::get('sort');
        $menu->parent_id = Input::get('parent_id');   
        
        $name = substr(Str::slug(Input::get('name')),0,25);

        if (Input::hasFile('image')) {
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $name.'-B'.rand(1,99999).'.'.$extension;
            $upload->move('media/menu/',$uploadname);
            Image::make('media/menu/'.$uploadname)->resize(268,130)->save();
            $menu->image = 'media/menu/'.$uploadname;
        }        

        $menu->save();

        if ($menu->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü eklendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));        
        }
        
    }

	public function getEdit($id) {
        $menus = Menu::findOrFail($id);

        if ($menus->type=='single') {
            return View::make('panel.module.menu.single',compact('menus'));
        }
        else if ($menus->type=='image') {
            $dropdownMenus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->get();            
            return View::make('panel.module.menu.image',compact('menus','dropdownMenus'));
        }
        else if ($menus->type=='dropdown') {
            $dropdownMenus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->get();
            return View::make('panel.module.menu.dropdown',compact('menus','dropdownMenus'));
        }
        else if ($menus->type=='three') {
            $threeMenus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->get();            
            return View::make('panel.module.menu.three',compact('menus','threeMenus'));
        }
        else if ($menus->type=='four') {
            $fourMenus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->get();            
            return View::make('panel.module.menu.four',compact('menus','fourMenus'));
        }       
        else if ($menus->type=='five') {
            $fiveMenus = Menu::where('parent_id','=',$id)->orderBy('sort','ASC')->get();            
            return View::make('panel.module.menu.five',compact('menus','fiveMenus'));
        }

	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Menu::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$menu = Menu::findOrFail($id);
        $menu->name = Input::get('name');
        $menu->status = (Input::get('status')=='1') ? '1' : '0';
        $menu->url = Input::get('url');
        $menu->sort = Input::get('sort');

        $name = substr(Str::slug(Input::get('name')),0,25);

        if (Input::hasFile('image')) {
            File::delete($menu->image);
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $name.'-B'.rand(1,99999).'.'.$extension;
            $upload->move('media/menu/',$uploadname);
            switch (Input::get('imageType')) {
                case '268':
                    Image::make('media/menu/'.$uploadname)->resize(268,130)->save();
                break;
                case '400':
                    Image::make('media/menu/'.$uploadname)->resize(400,200)->save();
                break;
                case '200':
                    Image::make('media/menu/'.$uploadname)->resize(200,200)->save();
                break;
                case '100':
                    Image::make('media/menu/'.$uploadname)->resize(200,100)->save();
                break;
            }
            $menu->image = 'media/menu/'.$uploadname;
        }

        $menu->save();
            
        if ($menu->type == 'dropdown') {
                    $dropdown = Menu::where('parent_id','=',$menu->id_menu)->orderBy('sort','ASC')->select('id_menu','name','url')->get();
                    $menu->tree = json_encode(array('menu'=>$dropdown));
                    $menu->save();
        }
        elseif ($menu->type == 'image') {
                    $dropdown = Menu::where('parent_id','=',$menu->id_menu)->orderBy('sort','ASC')->select('id_menu','name','url','image')->get();
                    $menu->tree = json_encode(array('menu'=>$dropdown));
                    $menu->save();
        }
        elseif ($menu->type == 'three' or $menu->type == 'four' or $menu->type == 'five') {
                    $dropdown = Menu::where('parent_id','=',$menu->id_menu)->orderBy('sort','ASC')->select('id_menu','name','url','image')->get();
                    foreach ($dropdown as $key => $value) {           
                        $json['id_menu'] = (int) $value['id_menu'];
                        $json['name'] = $value['name'];
                        $json['url'] = $value['url'];
                        $json['image'] = $value['image']; 
                        $json['child'] = Menu::where('parent_id','=',$value->id_menu)->orderBy('sort','ASC')->select('id_menu','name','url')->get();
                        $data[] = $json;
                        unset($json);
                    }
                    $menu->tree = json_encode(array('menu'=>$data));
                    $menu->save();
        }

        if ($menu->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $menu = Menu::findOrFail($id);
        File::delete($menu->image);
        $menu->delete();

        if (!$menu->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}

}