@extends('panel.template')

@section('content')

@include('panel.module.bannerBrand.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ LOGO</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/banner-brand/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('135 x 50 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">     
        {{ Form::file('image'); }}        
        </div>
        </div>        

        <div class="form-group">
        {{ Form::label('title', 'Logo Adı', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('title',null,['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('status', 'Logo Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('url', 'Logo Linki', array('class'=>'col-md-2 control-label')) }}
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