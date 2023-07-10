@extends('panel.template')

@section('content')

@include('panel.module.section.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ BÖLÜM TANIMLA</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/section/add','role'=>'form','class'=>'form-horizontal']) }}

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
            {{ Form::label('name', 'Bölüm Adı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][name]',null,['class'=>'form-control']) }}
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