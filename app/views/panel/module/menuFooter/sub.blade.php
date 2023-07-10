@extends('panel.template')

@section('content')

@include('panel.module.menuFooter.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul"><b>{{ $parentMenu->name }}</b> / LİNKLER</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <div class="text-right"><a class="btn btn-warning" href="{{ URL::to('Pv3/footer') }}"><i class="fa fa-chevron-circle-left"></i> Geri Dön</a><div>  
    <table class="table">
      <thead>
        <tr>
          <th>Sıralama</th>
          <th>Menü Adı</th>
          <th>Link</th>        
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          {{ Form::open(['url'=>'Pv3/footer/subadd','role'=>'form','class'=>'form-horizontal','files'=>true]) }}
          {{ Form::text('sort',null,['class'=>'form-control']) }}
          {{ Form::hidden('parent_id', $parentMenu->id_menu ) }}
          </td>
          <td>{{ Form::text('name',null,['class'=>'form-control']) }}</td>
          <td>{{ Form::text('url',null,['class'=>'form-control']) }}</td>         
          <td><button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i></button> {{ Form::close() }}</td>
          </td>
        </tr>         
        @foreach($menus as $menu)
        <tr>
          <td>
          {{ Form::open(['url'=>'Pv3/footer/save/'.$menu->id_menu.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}
          {{ Form::text('sort',$menu->sort,['class'=>'form-control']) }}
          </td>
          <td>{{ Form::text('name',$menu->name,['class'=>'form-control']) }}</td>
          <td>{{ Form::text('url',$menu->url,['class'=>'form-control']) }}</td>
          <td><button type="submit" class="btn btn-success"><i class="fa fa fa-floppy-o"></i></button> {{ Form::close() }}
          <a href="{{ URL::to('Pv3/footer/delete/'.$menu->id_menu.'') }}" class="btn btn-danger btn-left"><i class="fa fa-times"></i></a>
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