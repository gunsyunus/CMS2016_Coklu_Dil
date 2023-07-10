@extends('panel.template')

@section('content')

@include('panel.module.design.menu',array('page'=>'Renkler'))

@section('meta')
{{ HTML::style('panelv3/css/colorpicker.min.css') }}
@stop

@section('body')
<script type="text/javascript"> jQuery(document).ready(function() { jQuery(".colorformat").colorpicker(); }); </script>
{{ HTML::script('panelv3/js/jquery.colorpicker.min.js') }}
@stop

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">TASARIM RENKLERİNİ DEĞİŞTİR</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/design/colorsave/','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}

        <div class="form-group">

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('main', 'Temel Renk', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Sitenin ana rengini belirler. Buton renkleri, barlar ve diğer alanlarda geçerlidir.') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('main',null,['class'=>'form-control colorformat']) }}       
        </div>
        </div>     

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('menu', 'Menü Renk', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Ana menü için arkaplan rengi') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('menu',null,['class'=>'form-control colorformat']) }}       
        </div>
        </div>  

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('menufont', 'Menü Yazı Renk', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Ana menü için yazı rengi') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('menufont',null,['class'=>'form-control colorformat']) }}       
        </div>
        </div>          

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('footer', 'Footer Renk', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Sitenin en altındaki tablo için arkaplan rengi') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('footer',null,['class'=>'form-control colorformat']) }}       
        </div>
        </div>    

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('subfoo', 'Footer Alt Bar Renk', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('Alttaki bar için arkaplan rengi') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('subfoo',null,['class'=>'form-control colorformat']) }}       
        </div>
        </div>                

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">Lütfen değişiklikten sonra, "TARAYICI GEÇMİŞİNİ" silerek siteyi kontrol ediniz.</div>
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