@extends('panel.template')

@section('content')

@include('panel.module.setting.menu',array('page'=>'Seo ve Başlıklar'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">SEO ve BAŞLIKLAR</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/setting/textsave/','role'=>'form','class'=>'form-horizontal']) }}

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#language{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="language{{ $language->language_id }}">       

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('home_name', 'Anasayfa Başlığı', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Anasayfa,Home vb. kelimeler ya da sitenin kısa adı olabilir.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][home_name]',$language->home_name,['class'=>'form-control']) }}       
            </div>
            </div>   

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('search_name', 'Arama Kutusu ve Başlık', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Ara, Arama, Ne Aramıştınız ? vb. olabilir.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][search_name]',$language->search_name,['class'=>'form-control']) }}       
            </div>
            </div>               

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('title', 'Site Başlığı', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Minimum 3 ve maksimum 70 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][title]',$language->title,['class'=>'form-control']) }}       
            </div>
            </div>            

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('keyword', 'Anahtar Kelimeler', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 260 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][keyword]',$language->keyword,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('description', 'Description (Açıklama)', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 160 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][description]',$language->description,['class'=>'form-control']) }}       
            </div>
            </div>  

            <div class="form-group">
            {{ Form::label('copyright', 'Telif Hakkı Metin', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][copyright]',$language->copyright,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            {{ Form::label('welcome_msg', 'Site Slogan', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][welcome_msg]',$language->welcome_msg,['class'=>'form-control']) }}       
            </div>
            </div> 

            </div>                  
        @endforeach  
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