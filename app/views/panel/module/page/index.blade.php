@extends('panel.template')

@section('content')

@include('panel.module.page.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">SAYFA LİSTESİ <span class="badge">{{ $pages->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Sayfa Adı</th>
          <th>Linki</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($pages as $page)
        <tr>
          <th>{{ $page->id_page }}</th>
          <td>{{ $page->pagelanguage->title }}</td>
          <td>{{ Sef::page($page->pagelanguage->sef_url) }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/page/edit/'.$page->id_page.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/page/delete/'.$page->id_page.'') }}"><i class="fa fa-times"></i> Sayfayı Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $pages->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop