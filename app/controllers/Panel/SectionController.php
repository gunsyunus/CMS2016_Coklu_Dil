<?php

class Panel_SectionController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Section
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $sections = Section::with('sectionlanguage')->orderBy('id_section','DESC')->paginate(25);
		return View::make('panel.module.section.index',compact('sections'));
	}

	public function getNew() {
        $languages = Language::orderBy('id_language','ASC')->get();
		return View::make('panel.module.section.new',compact('languages'));
	}

	public function postAdd() {

    	$validator = Validator::make(Input::all(),Section::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $section = new Section;
        $section->save();

        $data['languageField'] = Input::get('languageField');

        if ($section->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new SectionLanguage;
                $language->name = $value['name'];
                $language->section_id = $section->id_section;
                $language->language_id = $key;
                $language->save();
            }; 

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa bölümü eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
		$sections = Section::findOrFail($id);
        $languages = SectionLanguage::with('language')->where('section_id','=',$id)->orderBy('language_id','ASC')->get();
		return View::make('panel.module.section.edit',compact('sections','languages'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Section::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$section = Section::findOrFail($id);
        $section->save();

        $data['languageField'] = Input::get('languageField');

        if ($section->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = SectionLanguage::where('section_id','=',$section->id_section)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->name = $value['name'];
                $language->save();
            };        	

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa bölümü güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $section = Section::findOrFail($id);
        $language = SectionLanguage::where('section_id','=',$section->id_section)->delete();
        $section->delete();

        if (!$section->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa bölümü silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}