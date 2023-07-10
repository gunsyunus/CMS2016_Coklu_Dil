@extends('panel.template')

@section('content')

@include('panel.module.product.menu')

@section('meta')
{{ HTML::style('panelv3/css/editor.min.css') }}
@stop

@section('body')
{{ HTML::script('panelv3/js/jquery.editor.min.js') }}
{{ HTML::script('panelv3/js/jquery.editor.tr.min.js') }}
@stop

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YENİ ÜRÜN EKLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/product/add/','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab">Temel Bilgiler</a></li>
        <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Açıklama</a></li>
        <li role="presentation"><a href="#display" aria-controls="display" role="tab" data-toggle="tab">Gösterimi</a></li>
        <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">Seo</a></li>
        <li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Ekstra</a></li>
        <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Galeri</a></li>                                     
    </ul>

    <br />

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="first">

        <!-- 1 -->


        <div class="form-group">
        {{ Form::label('code', 'Stok Kodu', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('code',null,['class'=>'form-control']) }}       
        </div>
        </div>     

        <div class="form-group">
        {{ Form::label('status', 'Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', true, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('500 x 600 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">     
        {{ Form::file('image1'); }}      
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('category_id', 'Kategori', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
          <select name="category_id" class="form-control">
            @foreach($categories as $category)      
              {{ NodeList::getSelect($category) }}
            @endforeach
          </select>
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('brand_id', 'Marka', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('brand_id',$brands,'-',['class'=>'form-control']) }}
        </div>
        </div>
     
        <!-- 1 -->                

        </div>
        <div role="tabpanel" class="tab-pane" id="content">
            
        <!-- 2 -->     

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->id_language=='1') class="active" @endif><a href="#languagecontent{{ $language->id_language }}" aria-controls="language{{ $language->id_language }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->id_language=='1') active @endif" id="languagecontent{{ $language->id_language }}">

            <div class="form-group">
            {{ Form::label('name', 'Ürün Adı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][name]',null,['class'=>'form-control']) }}       
            </div>
            </div>

            <div class="form-group">
            <div class="col-md-2 text-right">
            {{ Form::label('promotion_text', 'Promosyon Metni', array('class'=>'control-label')); }}
            {{ Tooltip::standard('ACİL, YENİ, ÖZEL vb. küçük notlar') }}   
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][promotion_text]',null,['class'=>'form-control']) }}       
            </div>
            </div>            

            <div class="form-group">
            {{ Form::label('short_content', 'Kısa Tanıtım', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::textarea('languageField['.$language->id_language.'][short_content]',null,['class'=>'form-control','rows'=>'2']) }}
            </div>
            </div>      

            <div class="form-group">
            {{ Form::label('content', 'Tanıtım', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->id_language.'][content]',null,['class'=>'editor']) }}
            </div>
            </div>                

            </div>                  
        @endforeach  
        </div>           

        <!-- 2 -->      

        </div>
        <div role="tabpanel" class="tab-pane" id="display">
            
        <!-- 3 -->     

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('showcase_status', 'Vitrinde Göster', array('class'=>'control-label')) }}
        {{ Tooltip::standard('Kategoriler anasayfasında listeler') }}    
        </div>
        <div class="col-md-10">
        {{ Form::checkbox('showcase_status', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>   

        <div class="form-group">
        {{ Form::label('private_status_1', 'Anasayfa Tab - 1', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_1', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_2', 'Anasayfa Tab - 2', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_2', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_3', 'Anasayfa Alt Tab - 1', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_3', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_4', 'Anasayfa Alt Tab - 2', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_4', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>                                

        <div class="form-group">
        {{ Form::label('private_status_5', 'Anasayfa Geniş Bant', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_5', '1', false, array('class'=>'checkboxes')); }}
        </div>
        </div>  

        <div class="form-group">
        {{ Form::label('showcase_sort', 'Vitrin Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('showcase_sort','9999',['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_sort', 'Anasayfa Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('private_sort','9999',['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('category_sort', 'Kategori Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('category_sort','9999',['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('brand_sort', 'Marka Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('brand_sort','9999',['class'=>'form-control']) }}       
        </div>
        </div>                        

        <!-- 3 -->      

        </div>        
        <div role="tabpanel" class="tab-pane" id="seo">
            
        <!-- 4 -->     

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->id_language=='1') class="active" @endif><a href="#languageseo{{ $language->id_language }}" aria-controls="language{{ $language->id_language }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->id_language=='1') active @endif" id="languageseo{{ $language->id_language }}">        

            <div class="form-group">
            {{ Form::label('title', 'Sayfa Başlığı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][title]',null,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('keyword', 'Anahtar Kelimeler', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 260 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][keyword]',null,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('description', 'Description (Açıklama)', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 160 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->id_language.'][description]',null,['class'=>'form-control']) }}       
            </div>
            </div>     

            </div>                  
        @endforeach  
        </div>           

        <!-- 4 -->      

        </div>            
        <div role="tabpanel" class="tab-pane" id="other">
            
        <!-- 5 -->

        <div class="form-group">
        {{ Form::label('cargo_weight', 'Desi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('cargo_weight',null,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('supply_company_name', 'Tedarikçi Firma Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('supply_company_name',null,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('shelf_code', 'Raf Kodu', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Stok takibi için deponuzdaki özel numaralar') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('shelf_code',null,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_ean', 'Barkod - EAN', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Avrupa Madde Numarası - 13 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_ean',null,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_upc', 'Barkod - UPC', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Evrensel Ürün Kodu - 12 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_upc',null,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_jan', 'Barkod - JAN', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Japonya Madde numarası - 8/13 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_jan',null,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('date', 'Kayıt Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        -
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('date', 'Güncelleme Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        -
        </div>
        </div>

        <!-- 5 -->  

        </div>
        <div role="tabpanel" class="tab-pane" id="option">
            
        <!-- 6 -->     

        <div class="alert alert-info" role="alert"><i class="fa fa-info-circle fa-fw"></i> Ürün eklendikten sonra, seçenekler girilebilir.</div>

        <!-- 6 -->      

        </div>
        <div role="tabpanel" class="tab-pane" id="gallery">
            
        <!-- 7 -->     

        <div class="alert alert-info" role="alert"><i class="fa fa-info-circle fa-fw"></i> Ürün eklendikten sonra, galeriye resim eklenebilir.</div>

        <!-- 7 -->      

        </div>                
    </div>
          
        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> EKLE</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>

@stop