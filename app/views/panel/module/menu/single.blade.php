@extends('panel.template')

@section('content')

@include('panel.module.menu.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">MENÜ DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/menu/save/'.$menus->id_menu.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}

         <div class="form-group">
        {{ Form::label('name', 'Menü Adı', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('name',$menus->name,['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('status', 'Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', $menus->status, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('url', 'Linki', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('url',$menus->url,['class'=>'form-control']) }}       
        </div>
        </div>  

        <div class="form-group">
        {{ Form::label('sort', 'Sıralama', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('sort',$menus->sort,['class'=>'form-control']) }}       
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