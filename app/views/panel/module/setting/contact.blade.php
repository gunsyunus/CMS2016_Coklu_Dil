@extends('panel.template')

@section('content')

@include('panel.module.setting.menu',array('page'=>'İletişim'))

@section('meta')
{{ HTML::style('panelv3/css/editor.min.css') }}
@stop

@section('body')
{{ HTML::script('panelv3/js/jquery.editor.min.js') }}
{{ HTML::script('panelv3/js/jquery.editor.tr.min.js') }}
@stop

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">İLETİŞİM SAYFASI</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/setting/contactsave/','role'=>'form','class'=>'form-horizontal']) }}


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
            {{ Form::label('contact_page_name', 'İletişim Sayfa Adı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][contact_page_name]',$language->contact_page_name,['class'=>'form-control']) }}       
            </div>
            </div>            

            <div class="form-group">
            {{ Form::label('contact_title_left', 'İletişim Sol Başlık', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][contact_title_left]',$language->contact_title_left,['class'=>'form-control']) }}       
            </div>
            </div>

            <div class="form-group">
            {{ Form::label('contact_title_right', 'İletişim Sağ Başlık', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][contact_title_right]',$language->contact_title_right,['class'=>'form-control']) }}       
            </div>
            </div>

            <div class="form-group">
            {{ Form::label('contact_map', 'İletişim Üst İçerik', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->language_id.'][contact_map]',$language->contact_map,['class'=>'editor']) }}
            </div>
            </div>

            <div class="form-group">
            {{ Form::label('contact_info', 'İletişim Alt İçerik', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->language_id.'][contact_info]',$language->contact_info,['class'=>'editor']) }}
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