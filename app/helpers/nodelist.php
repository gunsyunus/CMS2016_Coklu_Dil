<?php
	
class NodeList {

	/*
	|--------------------------------------------------------------------------
	| Baum - Node List => Select, Div, Frontend List
	|--------------------------------------------------------------------------
	*/
	
	public static function getSelect($node) {

    	$html = '<option value="'.$node->id_category.'">'.str_repeat('──',$node->depth).' '.$node->categorylanguage->name .'</option>'; 
    	
    	foreach($node->children as $child)
    	$html .= static::getSelect($child);    	
    	if ($node->depth==0) $html .= '<option disabled="disabled" class="select-line"></option>';

    	return $html;
	}


	public static function getAccordionMenu($node,$lang) {        
        
        if( $node->isLeaf() ) {
            if ($lang!='') $lang = $lang.'/';
        	return '<li class="level1"><span class="main-cat"><a href="'.URL::to($lang.'k/'.$node->categorylanguage->sef_url.'/'.$node->id_category).'">'.$node->categorylanguage->name.'</a></span></li>';
        } 
        else {
        	$html = '<li class="level1 open"><span class="main-cat"><a href="#">'.$node->categorylanguage->name.'</a></span>';
            $html .= '<ul>';
           	foreach($node->children as $child)
            $html .= static::getAccordionMenu($child,$lang);
            $html .= '</ul>';
            $html .= '</li>';
        }
        
        return $html;        
    }

}