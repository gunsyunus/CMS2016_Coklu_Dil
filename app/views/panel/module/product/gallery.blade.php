@extends('panel.template')

@section('content')

@include('panel.module.product.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul"><b>{{ $product->productlanguage->name }}</b> / GALERİ</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <div class="text-right"><a class="btn btn-warning" href="{{ URL::to('Pv3/product/edit/'.$product->id_product.'') }}"><i class="fa  fa-chevron-circle-left"></i> Ürüne Geri Dön</a><div>  

    <div class="gallery">
      {{ Form::open(['url'=>'Pv3/gallery/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}
      {{ Form::hidden('product_id', $product->id_product ) }}
      {{ Form::hidden('name', $product->productlanguage->name ) }} 
      {{ Form::file('images[]', array('multiple'=>true)) }}
      {{ Tooltip::standard('500 x 600 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}
      <button type="submit" class="btn btn-success right-space"><i class="fa fa-plus-circle"></i></button> 
      {{ Form::close() }}
    </div>

 <div class="clearfix"></div>

    @foreach($galleries as $gallery)
      <div class="gallery">
        <img src="{{ URL::to($gallery->image_small) }}" class="img-rounded img-responsive">
        <a href="{{ URL::to('Pv3/gallery/delete/'.$gallery->id_gallery.'') }}" class="btn btn-danger btn-left"><i class="fa fa-times"></i> SİL</a>
      </div>        
    @endforeach

    </div>
  </div>
</div>
</div>

@stop