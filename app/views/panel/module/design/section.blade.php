@extends('panel.template')

@section('content')

@include('panel.module.design.menu',array('page'=>'Blok Yerleşimi'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">BLOKLARI YÖNET / MODÜLLER</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12 form-group-line">
        
        {{ Form::open(['url'=>'Pv3/design/sectionsave/','role'=>'form','class'=>'form-horizontal']) }}  

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('text_section', 'Anasayfa Banner Altı Yazılar', array('class'=>'control-label')) }}
        {{ Tooltip::standard('4 adet yazı kutusunun bulunduğu yer') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('text_section', '1', $designs->text_section, array('class'=>'checkboxes')) }}
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('similar_product_section', 'Benzer Ürünler Modülü', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Otomatik olarak benzer ürünleri, ürün detay sayfasında görüntüler.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('similar_product_section', '1', $designs->similar_product_section, array('class'=>'checkboxes')) }}
        </div>
        </div>          

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('product_advert_title', 'Ürün Sağ Reklam Alanı', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Ürün sağ bölümünde reklam alanı bulunur.') }}
        </div>
        <div class="col-md-9">
        <a type="button" class="btn btn-default btn-sm btn-module" href="{{ URL::to('Pv3/design/product') }}">Reklamı Yönet</a>
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_1', 'Anasayfa Kutu Banner', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Büyük banner altına kutu şeklinde banner eklenebilir.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_1', '1', $designs->home_section_1, array('class'=>'checkboxes')) }}
        <a type="button" class="btn btn-default btn-sm btn-module" href="{{ URL::to('Pv3/banner-box') }}">Bannerları Yönet</a>
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_2', 'Anasayfa Tab Ürünler', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Tam sayfa sekmelerde ürünler listelenir. Her ürün için tab seçilmeli, metinleri ise tasarım yönetimi / metinden değiştirilmelidir.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_2', '1', $designs->home_section_2, array('class'=>'checkboxes')) }}
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_3', 'Anasayfa Alt Tab Ürünler', array('class'=>'control-label')) }}
        {{ Tooltip::standard('ANASAYFA TAB ürünler kullanımı ile aynıdır.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_3', '1', $designs->home_section_3, array('class'=>'checkboxes')) }}
        </div>
        </div>   

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_4', 'Anasayfa Geniş Bant Ürünler', array('class'=>'control-label')) }}
        {{ Tooltip::standard('ANASAYFA TAB ürünler kullanımı ile aynıdır.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_4', '1', $designs->home_section_4, array('class'=>'checkboxes')) }}
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_5', 'Anasayfa Alt Banner', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Footer üstüne banner ve buton eklenir.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_5', '1', $designs->home_section_5, array('class'=>'checkboxes')) }}
        <a type="button" class="btn btn-default btn-sm btn-module" href="{{ URL::to('Pv3/banner-sub') }}">Alt Bannerları Yönet</a>      
        </div>
        </div>         

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_6', 'Anasayfa Logolar', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Footer üstüne marka,referans vb. logolar eklenebilir.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_6', '1', $designs->home_section_6, array('class'=>'checkboxes')) }}
        <a type="button" class="btn btn-default btn-sm btn-module" href="{{ URL::to('Pv3/banner-brand') }}">Logoları Yönet</a>      
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-3 text-right">          
        {{ Form::label('home_section_7', 'Anasayfa Reklam Banner', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Anasayfaya büyük reklam bannerı eklenebilir.') }}
        </div>
        <div class="col-md-9">
        {{ Form::checkbox('home_section_7', '1', $designs->home_section_7, array('class'=>'checkboxes')) }}
        <a type="button" class="btn btn-default btn-sm btn-module" href="{{ URL::to('Pv3/design/advert') }}">Reklamı Yönet</a>
        </div>
        </div>                       

        <div class="form-group">
          <div class="col-md-offset-3 col-md-9">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> KAYDET</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop