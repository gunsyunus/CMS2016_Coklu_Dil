@extends('panel.template')

@section('content')

@include('panel.module.page.menu')

@section('meta')
{{ HTML::style('panelv3/css/editor.min.css') }}
@stop

@section('body')
{{ HTML::script('panelv3/js/jquery.editor.min.js') }}
{{ HTML::script('panelv3/js/jquery.editor.tr.min.js') }}
@stop

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ SAYFA OLUŞTUR</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/page/add','role'=>'form','class'=>'form-horizontal']) }}

        <div class="form-group">
        {{ Form::label('status', 'Sayfa Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('gallery_id', 'Galeri', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('gallery_id',$photos,'0',['class'=>'form-control']) }}
        </div>
        </div>                   

        <div class="form-group">
        {{ Form::label('section_id', 'Bölüm', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('section_id',$sections,'0',['class'=>'form-control']) }}
        </div>
        </div>    

        <div class="form-group">
        {{ Form::label('sort', 'Bölüm Sıralama', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('sort',null,['class'=>'form-control']) }}       
        </div>
        </div>                      

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->id_language=='1') class="active" @endif><a href="#language{{ $language->id_language }}" aria-controls="language{{ $language->id_language }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->id_language=='1') active @endif" id="language{{ $language->id_language }}">             

            <div class="form-group">
            {{ Form::label('title', 'Sayfa Başlığı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][title]',null,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('keyword', 'Anahtar Kelimeler', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 260 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][keyword]',null,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('description', 'Description (Açıklama)', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 160 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][description]',null,['class'=>'form-control']) }}       
            </div>
            </div>  

            <div class="form-group">
            {{ Form::label('content', 'Sayfa İçeriği', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->id_language.'][content]',null,['class'=>'editor']) }}
            </div>
        </div>  

            </div>                  
        @endforeach  
        </div>

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> EKLE</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop