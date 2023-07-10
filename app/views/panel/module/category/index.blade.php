@extends('panel.template')

@section('content')

@include('panel.module.category.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">KATEGORİ LİSTESİ <span class="badge">{{ $categories->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    @if (isset($searchText) != '')
      <span class="search-info"><i class="fa fa-search-plus"></i> "{{ $searchText }}" - Arama Sonuçları</span> <a href="{{ URL::to('Pv3/category') }}"><i class="fa fa-times-circle"></i></a>
    @endif
    {{ Form::open(['url'=>'Pv3/category/search','role'=>'form','class'=>'form-inline search-page','method'=>'get']) }}

      <select name="c" class="form-control">
        <option value="0" selected="selected">Kategori Seçiniz</option>
        @foreach($selects as $category)      
          {{ NodeList::getSelect($category) }}
        @endforeach
      </select>

      <span class="span-grey">ya da</span>

      <div class="input-group">
        <input type="text" name="q" placeholder="Kategori Adı" class="form-control" />
          <div class="input-group-btn">
            <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </div>
      </div>
    {{ Form::close() }}
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kategori Adı</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($categories as $category)
        <tr>
          <th>{{ $category->id_category }}</th>
          <td>{{ $category->categorylanguage->name }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/category/edit/'.$category->id_category.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/category/delete/'.$category->id_category.'') }}"><i class="fa fa-times"></i> Kategoriyi Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
      @endforeach      
      </tbody>
    </table>
    <div class="pagination"> {{ $categories->appends(Request::only('q'))->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop