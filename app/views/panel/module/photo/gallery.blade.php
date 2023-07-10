@extends('panel.template')

@section('content')

@include('panel.module.photo.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul"><b>{{ $photoAlbum->name }}</b> / GALERİ</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    <div class="gallery">
      {{ Form::open(['url'=>'Pv3/photo-item/add','role'=>'form','class'=>'form-horizontal','files'=>true]) }}
      {{ Form::hidden('gallery_id', $photoAlbum->id_gallery ) }}
      {{ Form::hidden('name', $photoAlbum->name ) }} 
      {{ Form::hidden('type', $photoAlbum->type ) }}
      {{ Form::file('images[]', array('multiple'=>true)) }}
          
          @if ($photoAlbum->type=='square') {{ Tooltip::standard('Önerilen : 175 x 175 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}
          @elseif ($photoAlbum->type=='rectangle') {{ Tooltip::standard('Önerilen : 700 x 440 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}
          @elseif ($photoAlbum->type=='vertical') {{ Tooltip::standard('Önerilen : 600 x 726 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}
          @endif

      <button type="submit" class="btn btn-success right-space"><i class="fa fa-plus-circle"></i></button> 
      {{ Form::close() }}
    </div>

 	<div class="clearfix"></div>

    @foreach($galleries as $gallery)
      <div class="gallery">
        <img src="{{ URL::to($gallery->image_small) }}" class="img-rounded img-responsive">
        <a href="{{ URL::to('Pv3/photo-item/delete/'.$gallery->id_photo.'') }}" class="btn btn-danger btn-left"><i class="fa fa-times"></i> SİL</a>
      </div>        
    @endforeach

    </div>
  </div>
</div>
</div>

@stop