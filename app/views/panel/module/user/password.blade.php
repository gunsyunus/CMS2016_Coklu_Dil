@extends('panel.template')

@section('content')

@include('panel.module.user.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YÖNETİCİ ŞİFRESİNİ DEĞİŞTİR</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/user/passwordsave/'.$users->id_user.'','role'=>'form','class'=>'form-horizontal']) }}      

        <div class="form-group">
        {{ Form::label('email', 'E-Posta', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ $users->email }}
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('password', 'Şifre', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Şifre minimum 8 karakter olmalı ve büyük, küçük harf içermesi önerilir.') }}    
        </div>            
        <div class="col-md-10">
        {{ Form::password('password',array('class'=>'form-control')) }}
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