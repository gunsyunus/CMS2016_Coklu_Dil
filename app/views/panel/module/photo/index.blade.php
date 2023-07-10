@extends('panel.template')

@section('content')

@include('panel.module.photo.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">GALERİ LİSTESİ <span class="badge">{{ $photos->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Galeri Adı</th>
          <th>Galeri Tipi</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($photos as $photo)
        <tr>
          <th>{{ $photo->id_gallery }}</th>
          <td>{{ $photo->name }}</td>
          <td>
          @if ($photo->type=='square') Kare
          @elseif ($photo->type=='rectangle') Dikdörtgen
          @elseif ($photo->type=='vertical') Dikey
          @endif
          </td>
          <td class="text-right">
          <a href="{{ URL::to('Pv3/photo/item/'.$photo->id_gallery.'') }}" class="btn btn-default btn-right-margin-extra"><i class="fa fa-picture-o btn-right-margin-extra"></i> Resimler</a>       
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/photo/edit/'.$photo->id_gallery.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/photo/delete/'.$photo->id_gallery.'') }}"><i class="fa fa-times"></i> Galeriyi Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $photos->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop