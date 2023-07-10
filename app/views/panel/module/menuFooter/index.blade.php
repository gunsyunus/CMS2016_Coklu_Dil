@extends('panel.template')

@section('content')

@include('panel.module.menuFooter.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">FOOTER MENÜLER {{ Tooltip::standard('Footer da üç kategori yan yana listelenir. Kategori ve parçalar görselin etkilenmemesi için silinemez !') }} </h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th>Dil</th>        
          <th>Sıralama</th>
          <th>Menü Adı</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>       
        @foreach($menus as $menu)
        <tr>
          <td><img src="{{ URL::to($menu->language->image_flag) }}" class="language img-thumbnail img-responsive" /></td>
          <td>
          {{ Form::open(['url'=>'Pv3/footer/save/'.$menu->id_menu.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}
          {{ Form::text('sort',$menu->sort,['class'=>'form-control']) }}
          </td>
          <td>{{ Form::text('name',$menu->name,['class'=>'form-control']) }}</td>
          <td><button type="submit" class="btn btn-success"><i class="fa fa fa-floppy-o"></i></button> {{ Form::close() }}</td>
          <td class="text-right"><a href="{{ URL::to('Pv3/footer/sub/'.$menu->id_menu.'') }}" class="btn btn-warning btn-left">Alt Linkleri</a>
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