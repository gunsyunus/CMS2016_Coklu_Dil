@extends('panel.template')

@section('content')

@include('panel.module.language.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ DİL TANIMLAMA</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/language/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('20 x 14 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">     
        {{ Form::file('image'); }}        
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">    
        {{ Form::label('name', 'Dil Adı', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Örnek : Türkçe, English') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('name',null,['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-2 text-right">    
        {{ Form::label('language_code', 'Dil Kodu', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Örnek : tr, en, de') }}   
        </div>
        <div class="col-md-10">
        {{ Form::text('language_code',null,['class'=>'form-control']) }}
        </div>
        </div>   

        <div class="form-group">
        <div class="col-md-2 text-right">    
        {{ Form::label('country_code', 'Ülke Kodu', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Örnek : tr-TR, en-US') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('country_code',null,['class'=>'form-control']) }}
        </div>
        </div>         

        <div class="form-group">
        {{ Form::label('status', 'Dil Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('sort', 'Bayrak Sıralama', array('class'=>'col-md-2 control-label')) }}
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