@extends('panel.template')

@section('content')

@include('panel.module.setting.menu',array('page'=>'Dosya Yöneticisi'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">DOSYA YÜKLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/setting/filesave/','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Dosya Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Uzantı JPG,PNG,GIF,PDF,RAR olmalıdır.') }}    
        </div>
        <div class="col-md-10">
        {{ Form::file('image'); }}
        </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> YÜKLE</button>
        </div>
        </div>
        
    {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop