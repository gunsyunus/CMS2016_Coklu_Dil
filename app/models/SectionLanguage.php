<?php

class SectionLanguage extends Eloquent {

	protected $table = 'pages_section_language';
    protected $primaryKey = 'id';
    public $timestamps = false;

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	} 
  
}
