@extends('panel.template')

@section('content')

@include('panel.module.photo.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">GALERİYİ DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/photo/save/'.$photos->id_gallery.'','role'=>'form','class'=>'form-horizontal']) }}

        <div class="form-group">
        {{ Form::label('name', 'Galeri Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('name',$photos->name,['class'=>'form-control']) }}       
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