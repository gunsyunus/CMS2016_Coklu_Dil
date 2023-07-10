@extends('panel.template')

@section('content')

@include('panel.module.product.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">KATEGORİ BAZLI ÜRÜN ARAMA</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/product/detailsearch','role'=>'form','class'=>'form-horizontal','method'=>'get']) }}

        <div class="form-group">
        {{ Form::label('category_id', 'Kategori', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
          <select name="q" class="form-control">
            <option value="0" selected="selected">Kategori Seçiniz</option>
            @foreach($categories as $category)      
              {{ NodeList::getSelect($category) }}
            @endforeach
          </select>
        </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> ARA</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop