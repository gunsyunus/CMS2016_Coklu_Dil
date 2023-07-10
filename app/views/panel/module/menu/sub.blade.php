@extends('panel.template')

@section('content')

@include('panel.module.menu.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul"><b>{{ $parentMenu->name }}</b> / ALT MENÜLERİ</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <div class="text-right"><a class="btn btn-warning" href="{{ URL::to('Pv3/menu/edit/'.$parentMenu->parent_id.'') }}"><i class="fa fa-list"></i> Menüye Geri Dön</a><div>  
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
        <tr>
          <td>
          {{ Form::open(['url'=>'Pv3/menu/subadd','role'=>'form','class'=>'form-horizontal','files'=>true]) }}
          {{ Form::text('sort',null,['class'=>'form-control']) }}
          {{ Form::hidden('parent_id', $parentMenu->id_menu ) }}
          </td>
          <td>{{ Form::text('name',null,['class'=>'form-control']) }}</td>
          <td>{{ Form::text('url',null,['class'=>'form-control']) }}</td>         
          <td><div class="mini-checkbox">{{ Form::checkbox('status', '1', true, array('class'=>'')); }}</div></td>
          <td><button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i></button> {{ Form::close() }}</td>
          </td>
        </tr>         
        @foreach($menus as $menu)
        <tr>
          <td>
          {{ Form::open(['url'=>'Pv3/menu/save/'.$menu->id_menu.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}
          {{ Form::text('sort',$menu->sort,['class'=>'form-control']) }}
          </td>
          <td>{{ Form::text('name',$menu->name,['class'=>'form-control']) }}</td>
          <td>{{ Form::text('url',$menu->url,['class'=>'form-control']) }}</td>
          <td><div class="mini-checkbox">{{ Form::checkbox('status', '1',$menu->status, array('class'=>'')); }}</div></td>
          <td><button type="submit" class="btn btn-success"><i class="fa fa fa-floppy-o"></i></button> {{ Form::close() }}
          <a href="{{ URL::to('Pv3/menu/delete/'.$menu->id_menu.'') }}" class="btn btn-danger btn-left"><i class="fa fa-times"></i></a>
          </td>
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