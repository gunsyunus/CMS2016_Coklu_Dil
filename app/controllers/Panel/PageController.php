<?php

class Panel_PageController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Page
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $pages = Page::with('pagelanguage')->orderBy('id_page','DESC')->paginate(25);
		return View::make('panel.module.page.index',compact('pages'));
	}

	public function getNew() {
        $sections = array('0'=>'Bölüm Yok')+SectionLanguage::orderBy('name','ASC')->lists('name','section_id');
        $photos = array('0'=>'Galeri Yok')+Photo::orderBy('name','ASC')->lists('name','id_gallery');
        $languages = Language::orderBy('id_language','ASC')->get();
		return View::make('panel.module.page.new',compact('sections','photos','languages'));
	}

	public function postAdd() {

    	$validator = Validator::make(Input::all(),Page::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $page = new Page;
        $page->status = (Input::get('status')=='1') ? '1' : '0';
        $page->sort = Input::get('sort');
        $page->section_id = Input::get('section_id');
        $page->gallery_id = Input::get('gallery_id');
        $page->save();

        $data['languageField'] = Input::get('languageField');

        if ($page->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new PageLanguage;
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->content = $value['content'];
                $language->page_id = $page->id_page;
                $language->language_id = $key;
                $language->save();
            };            

            $url = Sef::page(Str::slug($data['languageField']['1']['title']));

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa eklendi. <br /><i class="fa fa-link"></i> <strong>LİNK :</strong> '.$url));
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
		$pages = Page::findOrFail($id);
        $sections = array('0'=>'Bölüm Yok')+SectionLanguage::orderBy('name','ASC')->lists('name','section_id');		
        $photos = array('0'=>'Galeri Yok')+Photo::orderBy('name','ASC')->lists('name','id_gallery');        
        $languages = PageLanguage::with('language')->where('page_id','=',$id)->orderBy('language_id','ASC')->get();
		return View::make('panel.module.page.edit',compact('pages','sections','photos','languages'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Page::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$page = Page::findOrFail($id);
        $page->status = (Input::get('status')=='1') ? '1' : '0';
        $page->sort = Input::get('sort');
        $page->section_id = Input::get('section_id');
        $page->gallery_id = Input::get('gallery_id');        
        $page->save();

        $data['languageField'] = Input::get('languageField');

        if ($page->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = PageLanguage::where('page_id','=',$page->id_page)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->content = $value['content'];
                $language->save();
            };

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $page = Page::findOrFail($id);
        $language = PageLanguage::where('page_id','=',$page->id_page)->delete();
        $page->delete();

        if (!$page->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}