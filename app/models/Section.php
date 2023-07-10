<?php

class Section extends Eloquent {

	protected $table = 'pages_section';
    protected $primaryKey = 'id_section';
    public static $rules = ['languageField.1.name'=>'required']; 
    public $timestamps = false;

	public function sectionlanguage() {
		return $this->hasOne('SectionLanguage', 'section_id', 'id_section');
	}    
    
}
