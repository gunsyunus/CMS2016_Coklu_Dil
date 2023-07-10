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

        {{ Form::hidden('imageType','400') }}

         <div class="form-group">
        {{ Form::label('name', 'Menü Adı', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::text('name',$menus->name,['class'=>'form-control']) }}
        </div>
        </div>

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('400 x 200 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">   
        <img src="{{ empty($menus->image) ? URL::to('media/default/no-image.jpg') : URL::to($menus->image) }}" class="product img-thumbnail img-responsive" />                    
        {{ Form::file('image'); }}        
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

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">AÇILIR MENÜLER {{ Tooltip::standard('Üç kategori yan yana listelenir. Kategori ve parçalar görselin etkilenmemesi için silinemez !') }} </h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th>Sıralama</th>
          <th>Menü Adı</th>
          <th>Link</th>        
          <th>Durumu</th>
          <th></th>
        </tr>
      </thead>
      <tbody>       
        @foreach($threeMenus as $menu)
        <tr>
          <td>
          {{ Form::open(['url'=>'Pv3/menu/save/'.$menu->id_menu.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}
          {{ Form::text('sort',$menu->sort,['class'=>'form-control']) }}
          </td>
          <td>{{ Form::text('name',$menu->name,['class'=>'form-control']) }}</td>
          <td>{{ Form::text('url',$menu->url,['class'=>'form-control']) }}</td>
          <td><div class="mini-checkbox">{{ Form::checkbox('status', '1',$menu->status, array('class'=>'')); }}</div></td>
          <td><button type="submit" class="btn btn-success"><i class="fa fa fa-floppy-o"></i></button> {{ Form::close() }}
          <a href="{{ URL::to('Pv3/menu/sub/'.$menu->id_menu.'') }}" class="btn btn-warning btn-left">Alt Linkleri</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

@stop