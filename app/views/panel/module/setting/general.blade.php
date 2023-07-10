@extends('panel.template')

@section('content')

@include('panel.module.setting.menu',array('page'=>'Tanımlamalar'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">GENEL TANIMLAMALAR</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/setting/generalsave/','role'=>'form','class'=>'form-horizontal']) }}

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"  class="active"><a href="#social" aria-controls="social" role="tab" data-toggle="tab">Sosyal Medya</a></li>
        <li role="presentation"><a href="#code" aria-controls="code" role="tab" data-toggle="tab">Takip Kodları</a></li>
        <li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Mail Ayarları</a></li>       
        <li role="presentation"><a href="#search" aria-controls="search" role="tab" data-toggle="tab">Arama</a></li>
    </ul>

    <br />

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="social">
            
        <!-- 2 -->

        <div class="form-group">
        {{ Form::label('social_facebook_url', 'Facebook Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_facebook_url',$settings->social_facebook_url,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('social_twitter_url', 'Twitter Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_twitter_url',$settings->social_twitter_url,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        {{ Form::label('social_google_url', 'Google Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_google_url',$settings->social_google_url,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        {{ Form::label('social_linkedin_url', 'Linkedin Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_linkedin_url',$settings->social_linkedin_url,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        {{ Form::label('social_youtube_url', 'Youtube Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_youtube_url',$settings->social_youtube_url,['class'=>'form-control']) }}       
        </div>
        </div>         

        <div class="form-group">
        {{ Form::label('social_instagram_url', 'Instagram Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('social_instagram_url',$settings->social_instagram_url,['class'=>'form-control']) }}       
        </div>
        </div>                   

        <!-- 2 -->      

        </div>

        <div role="tabpanel" class="tab-pane" id="code">

        <!-- 5 -->

        <div class="form-group">
        {{ Form::label('tracing_body_after_code', 'HTML <body> Tag Sonrasına Ekle', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::textarea('tracing_body_after_code',$settings->tracing_body_after_code,['class'=>'form-control','rows'=>'4']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('tracing_body_before_code', 'HTML </body> Tag Öncesine Ekle', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::textarea('tracing_body_before_code',$settings->tracing_body_before_code,['class'=>'form-control','rows'=>'4']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('tracing_head_code', 'HTML </head> Tag Öncesine Ekle', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::textarea('tracing_head_code',$settings->tracing_head_code,['class'=>'form-control','rows'=>'4']) }}      
        </div>
        </div>                     

        <!-- 5 -->  

        </div>         
        <div role="tabpanel" class="tab-pane" id="email">

        <!-- 7 -->

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('email_admin', 'Yönetici E-Posta', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Sipariş verildiğinde, sistemde bir hata olduğunda YÖNETİCİYE mail gönderilir.') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('email_admin',$settings->email_admin,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('email_admin_name', 'Yönetici Mail Görünür Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('email_admin_name',$settings->email_admin_name,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('email_info', 'Müşteri Hizmetleri E-Posta', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Kullanıcılara kargo, yeni üyelik vb. durumlarda bu mail üzerinden gönderilir.') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('email_info',$settings->email_info,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('email_info_name', 'Müşteri Hizmetleri Mail Görünür Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('email_info_name',$settings->email_info_name,['class'=>'form-control']) }}       
        </div>
        </div>          

        <!-- 7 -->  

        </div>              
 		<div role="tabpanel" class="tab-pane" id="search">

        <!-- 8 -->

        <div class="form-group">
        {{ Form::label('search_type', 'Arama Tipi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('search_type', array('1'=>'Ürünlerde Ara','2'=>'Sayfalarda Ara'),$settings->search_type,['class'=>'form-control']) }}
        </div>
        </div>          

        <!-- 8 -->  

        </div>                      
    </div>
          
        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> KAYDET</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop