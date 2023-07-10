<?php

class Panel_CategoryController extends PanelController {

    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    public function getIndex() {
        $categories = Category::with('categorylanguage')->orderBy('id_category','DESC')->paginate(25);
        $selects = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        return View::make('panel.module.category.index',compact('categories','selects'));
    }

    public function getSearch() {
        $searchText = Input::get('q');
        $categoryID = Input::get('c');

        if ($categoryID=='0') {
            $categories = Category::with('categorylanguage')->whereHas('categorylanguage',function($q) use ($searchText) {
            $q->where('name','LIKE','%'.$searchText.'%'); })->orderBy('id_category','DESC')->paginate(25);
        }
        else {
            $categories = Category::where('id_category','=',$categoryID)->orderBy('id_category','DESC')->paginate(25);
            $searchText = $categories[0]->name;
        }        

        $selects = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        return View::make('panel.module.category.index',compact('categories','searchText','selects'));
    }    

    public function getNew() {
        $lists = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        $languages = Language::orderBy('id_language','ASC')->get();        
        return View::make('panel.module.category.new',compact('lists','languages'));
    }

    public function postAdd() {

        $validator = Validator::make(Input::all(),Category::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $category = new Category;
        $sort = Input::get('sort'); $category->sort = empty($sort) ? 9999 : $sort ;
        $category->save();

        $categoryMain = Input::get('categoryMain');
        if ($categoryMain!=0) {
            $category->makeChildOf($categoryMain);  
            $category->save();        
        }

        $data['languageField'] = Input::get('languageField');        

        if ($category->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new CategoryLanguage;
                $language->name = $value['name'];
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->category_id = $category->id_category;
                $language->language_id = $key;
                $language->save();
            }; 

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yeni kategori eklendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));        
        }
        
    }

    public function getEdit($id) {
        $categories = Category::findOrFail($id);
        $categoryMain = Category::where('id_category','=',$categories->parent_id)->first();
        $lists = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        $languages = CategoryLanguage::with('language')->where('category_id','=',$id)->orderBy('language_id','ASC')->get(); 
        return View::make('panel.module.category.edit',compact('categories','lists','categoryMain','languages'));
    }

    public function postSave($id) {

        $validator = Validator::make(Input::all(),Category::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $category = Category::findOrFail($id);
        $sort = Input::get('sort'); $category->sort = empty($sort) ? 9999 : $sort ;
        $category->save();

        $categoryMain = Input::get('categoryMain');
        if ($categoryMain!=0) {
            $category->makeChildOf($categoryMain);  
            $category->save();        
        }        

        $data['languageField'] = Input::get('languageField');        

        if ($category->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = CategoryLanguage::where('category_id','=',$category->id_category)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->name = $value['name'];
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->save();
            };            

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Kategori güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

    public function getDelete($id) {
        $category = Category::findOrFail($id);
        $language = CategoryLanguage::where('category_id','=',$category->id_category)->delete();        
        $category->delete();

        if (!$category->delete()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Kategori silindi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));      
        }     

    }       

}