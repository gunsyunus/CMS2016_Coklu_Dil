<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id_setting');
                  $table->string('title',70);
                  $table->string('keyword',260);
                  $table->string('description',160);
                  $table->string('copyright',100);
                  $table->string('welcome_msg',100); 
                  $table->string('social_facebook_url',150)->default('#');
                  $table->string('social_twitter_url',150)->default('#');
                  $table->string('social_google_url',150)->default('#');
                  $table->string('social_linkedin_url',150)->default('#');
                  $table->string('social_youtube_url',150)->default('#');
                  $table->string('social_instagram_url',150)->default('#');
                  $table->text('tracing_body_after_code');
                  $table->text('tracing_body_before_code');
                  $table->text('tracing_head_code');
                  $table->text('tracing_customer_code');
                  $table->text('tracing_order_code');
                  $table->decimal('cargo_total',12,2);
                  $table->decimal('cargo_price',12,2);
                  $table->string('cargo_text',30);   
                  $table->string('order_method',2);
                  $table->string('agreement_user_url',150)->default('#');
                  $table->string('agreement_order_url',150)->default('#');    
                  $table->string('email_admin',75);
                  $table->string('email_admin_name',75);
                  $table->string('email_info',75);
                  $table->string('email_info_name',75);
		});
	}

	public function down()
	{
         Schema::drop('settings');
	}

}
