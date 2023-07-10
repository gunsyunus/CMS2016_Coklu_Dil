<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignTable extends Migration {

	public function up()
	{
		Schema::create('designs', function(Blueprint $table)
		{
		        $table->increments('id_design');
                $table->string('logo',100);
                $table->string('footer_logo',100);
                $table->string('favicon_logo',100);
                $table->string('footer_slogan',100);
                $table->string('footer_contact_1',100);
                $table->string('footer_contact_2',100);
                $table->string('footer_contact_3',100);
                $table->string('newsletter_text',50);
                $table->string('product_title_text',50);
                $table->string('outlet_title_text',50);
                $table->string('outlet_section',1)->default('1');
                $table->string('home_text_1',100);
                $table->string('home_text_2',100);
                $table->string('home_text_3',100);
                $table->string('home_text_4',100);
                $table->string('home_text_5',100);
                $table->string('home_text_6',100);
                $table->string('home_text_7',100);
                $table->string('home_text_8',100);
                $table->string('home_text_9',100);
                $table->string('home_text_10',100);
                $table->string('home_text_11',100);
                $table->string('home_text_12',100);
                $table->string('home_text_13',100);
                $table->string('home_text_14',100);
                $table->string('home_tab_text_1',50);
                $table->string('home_tab_text_2',50);
                $table->string('home_tab_text_3',50);
                $table->string('home_tab_text_4',50);
                $table->string('home_tab_text_5',50);
                $table->string('home_tab_text_6',50);
                $table->string('home_title_1',100);
                $table->string('home_section_1',1)->default('1');    
                $table->string('home_section_2',1)->default('1');
                $table->string('home_section_3',1)->default('1');
                $table->string('home_section_4',1)->default('1');
                $table->string('home_section_5',1)->default('1');
                $table->string('home_section_6',1)->default('1');
                $table->string('home_section_7',1)->default('1');
                $table->string('text_section',1)->default('1');              
                $table->string('advert_link',50);
                $table->string('advert_image',100);
                $table->string('product_advert_title',50);
                $table->text('product_advert_content');
                $table->string('similar_product_title',50);
                $table->string('similar_product_section',1)->default('1');
                $table->string('icon_status_1',1)->default('1');    
                $table->string('icon_status_2',1)->default('1');    
                $table->string('icon_status_3',1)->default('1');    
                $table->string('icon_status_4',1)->default('1');
                $table->string('home_link',100);
		});
	}

	public function down()
	{
       Schema::drop('designs');
	}

}
