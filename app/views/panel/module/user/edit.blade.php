@extends('panel.template')

@section('content')

@include('panel.module.user.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YÖNETİCİYİ DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/user/save/'.$users->id_user.'','role'=>'form','class'=>'form-horizontal']) }}

        <div class="form-group">
        {{ Form::label('name', 'Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('name',$users->name,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('surname', 'Soyad', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('surname',$users->surname,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('created_at', 'Kayıt Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ $users->created_at->format('d.m.Y H:i') }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('updated_at', 'Güncelleme Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ $users->updated_at->format('d.m.Y H:i') }}
        </div>
        </div>                

        <div class="form-group">
        <div class="col-md-2 text-right">
        {{ Form::label('email', 'E-Posta', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Sisteme giriş ve bilgilendirme mailleri için kullanılır.') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('email',$users->email,['class'=>'form-control']) }}       
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