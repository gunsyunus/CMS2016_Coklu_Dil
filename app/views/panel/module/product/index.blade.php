@extends('panel.template')

@section('content')

@include('panel.module.product.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">ÜRÜN LİSTESİ <span class="badge">{{ $products->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    @if (isset($searchText) != '' and isset($categoryText) == '')
      <span class="search-info"><i class="fa fa-search-plus"></i> "{{ $searchText }}" - Arama Sonuçları</span> <a href="{{ URL::to('Pv3/product') }}"><i class="fa fa-times-circle"></i></a>
    @endif

    @if (isset($categoryText) != '')
      <span class="search-info"><i class="fa fa-search-plus"></i> "{{ $categoryText }}" - Arama Sonuçları</span> <a href="{{ URL::to('Pv3/product') }}"><i class="fa fa-times-circle"></i></a>
    @endif

    {{ Form::open(['url'=>'Pv3/product/search','role'=>'form','class'=>'form-inline search-page','method'=>'get']) }}
      <div class="input-group">
        <input type="text" name="q" placeholder="Ürün Adı veya Kodu" class="form-control" />
          <div class="input-group-btn">
            <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </div>
      </div>      
      <a href="{{ URL::to('Pv3/product/detail') }}" class="btn btn-default btn-right-margin">Kategorilerde Ara</a>
    {{ Form::close() }}
    <br /><br />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Resim</th> 
          <th>Ürün Adı</th>
          <th>Stok Kodu</th>
          <th>Durum</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($products as $product)
        <tr>
          <th>{{ $product->id_product }}</th>
          <td><img src="{{ empty($product->image_small_1) ? URL::to('media/default/no-image.jpg') : URL::to($product->image_small_1) }}" class="product img-thumbnail img-responsive" /></td>
          <td>{{ $product->productlanguage->name }}</td>
          <td>{{ $product->code }}</td>
          <td>{{ $product->status=='1' ? '<span class="label label-success">AKTİF</span>' : '<span class="label label-danger">PASİF</span>' }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/product/edit/'.$product->id_product.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{ URL::to('Pv3/product/gallery/'.$product->id_product.'') }}"><i class="fa fa-picture-o"></i> Galeri</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ URL::to('Pv3/product/copy/'.$product->id_product.'') }}"><i class="fa fa-clipboard"></i> Kopyala (Detaysız)</a></li>
          <li role="separator" class="divider"></li>
          <li class="delete"><a href="{{ URL::to('Pv3/product/delete/'.$product->id_product.'') }}"><i class="fa fa-times"></i> Ürünü Sil</a></li>
          </ul>
          </div>
          </td>
        </tr>
      @endforeach      
      </tbody>
    </table>
    <div class="pagination"> {{ $products->appends(Request::only('q'))->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop