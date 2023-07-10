<?php

class Panel_DesignController extends PanelController {

    /*
    |--------------------------------------------------------------------------
    | Design
    |--------------------------------------------------------------------------
    */

    public function getLogo() {
        $designs = Design::findOrFail(1);
        return View::make('panel.module.design.logo',compact('designs'));
    }

    public function postLogosave() {

        $validator = Validator::make(Input::all(),Design::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $design = Design::findOrFail(1);

        if (Input::hasFile('logo')) {
            $upload = Input::file('logo');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = 'logo.'.$extension;
            $upload->move('media/logo/',$uploadname);
            $design->logo = 'media/logo/'.$uploadname;
            Image::make('media/logo/'.$uploadname)->resize(220,70)->save();
            $design->save();
        }

        if ($design->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Logo güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

    public function getText() {
        $designs = Design::findOrFail(1);
        $languages = Design::with('language')->orderBy('language_id','ASC')->get();        
        return View::make('panel.module.design.text',compact('designs','languages'));
    }

    public function postTextsave() {

            $data['languageField'] = Input::get('languageField');   

            foreach ($data['languageField'] as $key => $value) {
                $language = Design::where('language_id','=',$key)->firstOrFail();
                $language->home_text_1 = $value['home_text_1'];
                $language->home_text_2 = $value['home_text_2'];
                $language->home_text_3 = $value['home_text_3'];
                $language->home_text_4 = $value['home_text_4'];
                $language->home_text_5 = $value['home_text_5'];
                $language->home_text_6 = $value['home_text_6'];
                $language->home_text_7 = $value['home_text_7'];
                $language->home_text_8 = $value['home_text_8'];
                $language->home_text_9 = $value['home_text_9'];
                $language->home_text_10 = $value['home_text_10'];
                $language->home_text_11 = $value['home_text_11'];
                $language->home_text_12 = $value['home_text_12'];
                $language->home_text_13 = $value['home_text_13'];
                $language->home_text_14 = $value['home_text_14'];
                $language->home_tab_text_1 = $value['home_tab_text_1'];
                $language->home_tab_text_2 = $value['home_tab_text_2'];
                $language->home_tab_text_3 = $value['home_tab_text_3'];
                $language->home_tab_text_4 = $value['home_tab_text_4'];
                $language->home_tab_text_5 = $value['home_tab_text_5'];
                $language->home_tab_text_6 = $value['home_tab_text_6'];
                $language->product_title_text = $value['product_title_text'];
                $language->similar_product_title = $value['similar_product_title'];   
                $language->home_link = $value['home_link'];    
                $language->save();
            };  

          if ($language->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Metinler güncellendi.'));      
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

    public function getFooter() {
        $designs = Design::findOrFail(1);
        $languages = Design::with('language')->orderBy('language_id','ASC')->get();
        return View::make('panel.module.design.footer',compact('designs','languages'));
    }

    public function postFootersave() {

        $validator = Validator::make(Input::all(),Design::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }

        if (Input::hasFile('footer_logo')) {
            $design = Design::findOrFail(1);
            $upload = Input::file('footer_logo');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = 'footer_logo.'.$extension;
            $upload->move('media/logo/',$uploadname);
            $design->footer_logo = 'media/logo/'.$uploadname;
            Image::make('media/logo/'.$uploadname)->resize(230,104)->save();
            $design->save();
        }

            $data['languageField'] = Input::get('languageField');   

            foreach ($data['languageField'] as $key => $value) {
                $language = Design::where('language_id','=',$key)->firstOrFail();
                $language->home_title_1 = $value['home_title_1'];
                $language->footer_slogan = $value['footer_slogan'];
                $language->footer_contact_1 = $value['footer_contact_1'];
                $language->footer_contact_2 = $value['footer_contact_2'];
                $language->footer_contact_3 = $value['footer_contact_3'];
                $language->save();
            };          

        if ($language->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Logo güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }    

    public function getSection() {
        $designs = Design::findOrFail(1);
        return View::make('panel.module.design.section',compact('designs'));
    }

    public function postSectionsave() {
      
        $design = Design::findOrFail(1);
        $design->outlet_section = (Input::get('outlet_section')=='1') ? '1' : '0'; 
        $design->similar_product_section = (Input::get('similar_product_section')=='1') ? '1' : '0';
        $design->home_section_1 = (Input::get('home_section_1')=='1') ? '1' : '0'; 
        $design->home_section_2 = (Input::get('home_section_2')=='1') ? '1' : '0'; 
        $design->home_section_3 = (Input::get('home_section_3')=='1') ? '1' : '0'; 
        $design->home_section_4 = (Input::get('home_section_4')=='1') ? '1' : '0'; 
        $design->home_section_5 = (Input::get('home_section_5')=='1') ? '1' : '0'; 
        $design->home_section_6 = (Input::get('home_section_6')=='1') ? '1' : '0';      
        $design->home_section_7 = (Input::get('home_section_7')=='1') ? '1' : '0';
        $design->text_section = (Input::get('text_section')=='1') ? '1' : '0';
        $design->save();

        if ($design->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Bloklar güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }     

    public function getAdvert() {
        $designs = Design::findOrFail(1);
        $languages = Design::with('language')->orderBy('language_id','ASC')->get();        
        return View::make('panel.module.design.advert',compact('designs','languages'));
    }

    public function postAdvertsave() {
      
        $validator = Validator::make(Input::all(),Design::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }

        $design = Design::findOrFail(1);
      
        if (Input::hasFile('advert_image')) {
            $upload = Input::file('advert_image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = 'Home-B'.rand(1,99999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            Image::make('media/other/'.$uploadname)->resize(1170,149)->save();
            $design->advert_image = 'media/other/'.$uploadname;
        }

        $design->save();

            $data['languageField'] = Input::get('languageField');   

            foreach ($data['languageField'] as $key => $value) {
                $language = Design::where('language_id','=',$key)->firstOrFail();
                $language->advert_link = $value['advert_link'];
                $language->save();
            };         

        if ($design->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Reklam alanı güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }       

    public function getProduct() {
        $designs = Design::findOrFail(1);
        $languages = Design::with('language')->orderBy('language_id','ASC')->get();        
        return View::make('panel.module.design.product',compact('designs','languages'));
    }

    public function postProductsave() {
      
        $data['languageField'] = Input::get('languageField');   

        foreach ($data['languageField'] as $key => $value) {
            $language = Design::where('language_id','=',$key)->firstOrFail();
            $language->product_advert_title = $value['product_advert_title'];
            $language->product_advert_content = $value['product_advert_content'];
            $language->save();
        };

        if ($language->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Reklam alanı güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }      

    public function getColor() {
        return View::make('panel.module.design.color');
    }    


    public function postColorsave() {
        
        $main = Input::get('main');
        $menu = Input::get('menu');
        $menufont = Input::get('menufont');        
        $footer = Input::get('footer');
        $subfoo = Input::get('subfoo');

        $delete = File::delete('./assets/css/style.css');
        $copy = File::copy('./assets/css/default.css','./assets/css/style.css');
        $css = File::get('./assets/css/style.css');
        $oldColor = array('MAINCOLOR','MENUCOLOR','FOOTERCOLOR','SUBFOOCOLOR','MENUFONTCOLOR');
        $newColor = array($main,$menu,$footer,$subfoo,$menufont);
        $new = str_replace($oldColor,$newColor,$css);
        $change = File::put('./assets/css/style.css',$new);
        return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Reklam alanı güncellendi.'));       
    }       
 

    public function getFavicon() {
        $designs = Design::findOrFail(1);
        return View::make('panel.module.design.favicon',compact('designs'));
    }

    public function postFaviconsave() {

        $validator = Validator::make(Input::all(),Design::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $design = Design::findOrFail(1);

        if (Input::hasFile('favicon_logo')) {
            $upload = Input::file('favicon_logo');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = 'favicon.'.$extension;
            $upload->move('media/logo/',$uploadname);
            $design->favicon_logo = 'media/logo/'.$uploadname;
            Image::make('media/logo/'.$uploadname)->resize(16,16)->save();
            $design->save();
        }

        if ($design->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Logo güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }  

}