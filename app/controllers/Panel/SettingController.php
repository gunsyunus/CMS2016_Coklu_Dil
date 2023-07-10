<?php

class Panel_SettingController extends PanelController {

    /*
    |--------------------------------------------------------------------------
    | Setting
    |--------------------------------------------------------------------------
    */

    public function getGeneral() {
        $settings = Setting::findOrFail(1);
        return View::make('panel.module.setting.general',compact('settings'));
    }
  
    public function getFile() {
        return View::make('panel.module.setting.file');
    }        

    public function getContact() {
        $languages = Setting::with('language')->orderBy('language_id','ASC')->get();
        return View::make('panel.module.setting.contact',compact('languages'));
    }       

    public function getText() {
        $languages = Setting::with('language')->orderBy('language_id','ASC')->get();
        return View::make('panel.module.setting.text',compact('languages'));
    }       

    public function postGeneralsave() {

        $validator = Validator::make(Input::all(),Setting::$rules['general']);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $setting = Setting::findOrFail(1); 
        $setting->social_facebook_url = Input::get('social_facebook_url');  
        $setting->social_twitter_url = Input::get('social_twitter_url');  
        $setting->social_google_url = Input::get('social_google_url');  
        $setting->social_linkedin_url = Input::get('social_linkedin_url');  
        $setting->social_youtube_url = Input::get('social_youtube_url');
        $setting->social_instagram_url = Input::get('social_instagram_url');      
        $setting->tracing_body_after_code = Input::get('tracing_body_after_code');
        $setting->tracing_body_before_code = Input::get('tracing_body_before_code');
        $setting->tracing_head_code = Input::get('tracing_head_code');
        $setting->tracing_customer_code = Input::get('tracing_customer_code');
        $setting->tracing_order_code = Input::get('tracing_order_code');
        $setting->email_admin = Input::get('email_admin');
        $setting->email_admin_name = Input::get('email_admin_name');
        $setting->email_info = Input::get('email_info');
        $setting->email_info_name = Input::get('email_info_name');
        $setting->search_type = Input::get('search_type');
        $setting->save();

        if ($setting->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Bilgiler güncellendi.'));      
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

    public function postFilesave() {

        $validator = Validator::make(Input::all(),Setting::$rules['file']);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }

        if (Input::hasFile('image')) {
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = 'R'.rand(1,999999999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            $url = URL::to('media/other/'.$uploadname);
        }        
        
        if ($url) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Dosya yüklendi. <br /><i class="fa fa-link"></i> <strong>LİNK :</strong> '.$url));      
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));
        }

    }

    public function postContactsave() {

        $data['languageField'] = Input::get('languageField');   

            foreach ($data['languageField'] as $key => $value) {
                $language = Setting::where('language_id','=',$key)->firstOrFail();
                $language->contact_title_left = $value['contact_title_left'];
                $language->contact_title_right = $value['contact_title_right'];
                $language->contact_map = $value['contact_map'];
                $language->contact_info = $value['contact_info'];
                $language->contact_page_name = $value['contact_page_name'];
                $language->save();
            };        

        if ($language->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'İletişim sayfası güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }


    public function postTextsave() {

        $validator = Validator::make(Input::all(),Setting::$rules['text']);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $data['languageField'] = Input::get('languageField');

            foreach ($data['languageField'] as $key => $value) {
                $language = Setting::where('language_id','=',$key)->firstOrFail();
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->copyright = $value['copyright'];
                $language->welcome_msg = $value['welcome_msg'];
                $language->home_name = $value['home_name'];
                $language->search_name = $value['search_name'];
                $language->save();
            };

        if ($language->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Bilgiler güncellendi.'));      
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }

}