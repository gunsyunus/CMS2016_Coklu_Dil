@extends('panel.template')

@section('content')

@include('panel.module.menu.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ MENÜ</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/menu/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

         <div class="form-group">
        {{ Form::label('name', 'Menü Adı', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('name',null,['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('status', 'Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('url', 'Linki', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('url',null,['class'=>'form-control']) }}       
        </div>
        </div>  

        <div class="form-group">
        {{ Form::label('sort', 'Sıralama', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('sort',null,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('type', 'Menü Tipi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('type', array('single'=>'Tekli Menü',
                                      'five'=>'5\'li Menü',
                                      'four'=>'4\'lü Menü',
                                      'three'=>'3\'lü Menü',
                                      'image'=>'Resimli Menü',
                                      'dropdown'=>'Açılır Menü'
                                      ),
                                      'single',['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('language_id', 'Dil', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('language_id',$languages,'-',['class'=>'form-control']) }}
        </div>
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