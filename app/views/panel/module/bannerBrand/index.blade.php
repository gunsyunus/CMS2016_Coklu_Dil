@extends('panel.template')

@section('content')

@include('panel.module.bannerBrand.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">LOGOLAR <span class="badge">{{ $banners->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sıralama</th>
          <th>Logo Adı</th>
          <th>Resim</th>
          <th>Durumu</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($banners as $banner)
        <tr>
          <th>{{ $banner->sort }}</th>
          <td>{{ $banner->title }}</td>
          <td><img src="{{ URL::to($banner->image) }}" class="banner img-thumbnail img-responsive" /></td>          
          <td>{{ $banner->status=='1' ? '<span class="label label-success">AKTİF</span>' : '<span class="label label-danger">PASİF</span>' }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/banner-brand/edit/'.$banner->id_banner.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/banner-brand/delete/'.$banner->id_banner.'') }}"><i class="fa fa-times"></i> Logo Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $banners->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop