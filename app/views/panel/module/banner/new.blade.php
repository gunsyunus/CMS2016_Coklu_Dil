@extends('panel.template')

@section('content')

@include('panel.module.banner.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ BANNER</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/banner/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('1920 x 410 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">     
        {{ Form::file('image'); }}        
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('status', 'Banner Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('sort', 'Sıralama', array('class'=>'col-md-2 control-label')) }}
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
            {{ Form::label('title', 'Banner Adı', array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][title]',null,['class'=>'form-control']) }}
            </div>
            </div>      

            <div class="form-group">
            {{ Form::label('url', 'Banner Linki', array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][url]',null,['class'=>'form-control']) }}       
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