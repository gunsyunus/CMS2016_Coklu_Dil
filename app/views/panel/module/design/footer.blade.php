@extends('panel.template')

@section('content')

@include('panel.module.design.menu',array('page'=>'Footer'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">FOOTER ALANINI DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/design/footersave/','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#logo" aria-controls="logo" role="tab" data-toggle="tab">Logo ve Slogan</a></li>
        <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Hızlı İletişim</a></li>
    </ul>

    <br />

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="logo">

        <!-- 1 -->

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('footer_logo', 'Footer Logo', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('230 x 104 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">
        <img src="{{ URL::to($designs->footer_logo) }}" class="banner img-thumbnail img-responsive" />
        {{ Form::file('footer_logo') }}
        </div>
        </div>

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#languagelogo{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="languagelogo{{ $language->language_id }}">          

            <div class="form-group">
            {{ Form::label('footer_slogan', 'Footer Slogan', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][footer_slogan]',$language->footer_slogan,['class'=>'form-control']) }}       
            </div>
            </div>

            </div>                  
        @endforeach  
        </div>                             

        <!-- 1 -->

        </div>
        <div role="tabpanel" class="tab-pane" id="contact">
            
        <!-- 2 -->

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
            {{ Form::label('home_title_1', 'Sütun Başlığı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][home_title_1]',$language->home_title_1,['class'=>'form-control']) }}       
            </div>
            </div>

            <div class="form-group">
            {{ Form::label('footer_contact_1', 'Adres', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][footer_contact_1]',$language->footer_contact_1,['class'=>'form-control']) }}       
            </div>
            </div>    

            <div class="form-group">
            {{ Form::label('footer_contact_2', 'Telefon', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][footer_contact_2]',$language->footer_contact_2,['class'=>'form-control']) }}       
            </div>
            </div>  

            <div class="form-group">
            {{ Form::label('footer_contact_3', 'İletişim', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][footer_contact_3]',$language->footer_contact_3,['class'=>'form-control']) }}       
            </div>
            </div>

            </div>                  
        @endforeach  
        </div>     

        <!-- 2 -->      

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