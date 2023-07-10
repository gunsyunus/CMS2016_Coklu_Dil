@extends('panel.template')

@section('content')

@include('panel.module.brand.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">MARKA LİSTESİ <span class="badge">{{ $brands->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Marka Adı</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($brands as $brand)
        <tr>
          <th>{{ $brand->id_brand }}</th>
          <td>{{ $brand->bname }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/brand/edit/'.$brand->id_brand.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/brand/delete/'.$brand->id_brand.'') }}"><i class="fa fa-times"></i> Markayı Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $brands->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop