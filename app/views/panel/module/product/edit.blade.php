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
    <h3 class="panel-title panel-modul">ÜRÜN DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/product/save/'.$products->id_product.'','role'=>'form','class'=>'form-horizontal','files'=>true]) }}

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab">Temel Bilgiler</a></li>
        <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Açıklama</a></li>
        <li role="presentation"><a href="#display" aria-controls="display" role="tab" data-toggle="tab">Gösterimi</a></li>
        <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">Seo</a></li>
        <li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Ekstra</a></li>
        <li role="presentation"><a href="{{ URL::to('Pv3/product/gallery/'.$products->id_product.'') }}" aria-controls="gallery" role="tab">Galeri <i class="fa fa-external-link fa-fw"></i></a></li>                                     
    </ul>

    <br />

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="first">

        <!-- 1 -->

        <div class="form-group">
        {{ Form::label('code', 'Stok Kodu', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('code',$products->code,['class'=>'form-control']) }}       
        </div>
        </div>     

        <div class="form-group">
        {{ Form::label('status', 'Durumu', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', $products->status, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">        
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('500 x 600 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">
        <img src="{{ empty($products->image_small_1) ? URL::to('media/default/no-image.jpg') : URL::to($products->image_small_1) }}" class="product img-thumbnail img-responsive" />          
        {{ Form::file('image1'); }}
        </div>
        </div>
        
        <div class="form-group">
        {{ Form::label('category_id', 'Kategori', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
          <select name="category_id" class="form-control">
            <optgroup label="Seçili Kategori">
               <option value="{{ $products->category_id }}" selected="selected">{{ $categoryMain->categorylanguage->name }}</option>
            </optgroup>
            <optgroup label="Yeni Kategori">
            @foreach($categories as $category)
              {{ NodeList::getSelect($category) }}
            @endforeach
            </optgroup>
          </select>
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('brand_id', 'Marka', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::select('brand_id',$brands,$products->brand_id,['class'=>'form-control']) }}
        </div>
        </div>
  
        <!-- 1 -->                

        </div>
        <div role="tabpanel" class="tab-pane" id="content">
            
        <!-- 2 -->     


        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#languagecontent{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="languagecontent{{ $language->language_id }}">

            <div class="form-group">
            {{ Form::label('name', 'Ürün Adı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][name]',$language->name,['class'=>'form-control']) }}       
            </div>
            </div>

            <div class="form-group">
            <div class="col-md-2 text-right">
            {{ Form::label('promotion_text', 'Promosyon Metni', array('class'=>'control-label')); }}
            {{ Tooltip::standard('ACİL, YENİ, ÖZEL vb. küçük notlar') }}   
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][promotion_text]',$language->promotion_text,['class'=>'form-control']) }}       
            </div>
            </div>            

            <div class="form-group">
            {{ Form::label('short_content', 'Kısa Tanıtım', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::textarea('languageField['.$language->language_id.'][short_content]',$language->short_content,['class'=>'form-control','rows'=>'2']) }}
            </div>
            </div>      

            <div class="form-group">
            {{ Form::label('content', 'Tanıtım', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->language_id.'][content]',$language->content,['class'=>'editor']) }}
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
        {{ Form::checkbox('showcase_status', '1', $products->showcase_status, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_1', 'Anasayfa Tab - 1', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_1', '1', $products->private_status_1, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_2', 'Anasayfa Tab - 2', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_2', '1', $products->private_status_2, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_3', 'Anasayfa Alt Tab - 1', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_3', '1', $products->private_status_3, array('class'=>'checkboxes')); }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_status_4', 'Anasayfa Alt Tab - 2', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_4', '1', $products->private_status_4, array('class'=>'checkboxes')); }}
        </div>
        </div>                                

        <div class="form-group">
        {{ Form::label('private_status_5', 'Anasayfa Geniş Bant', array('class'=>'col-md-2 control-label')) }}
        <div class="col-md-10">
        {{ Form::checkbox('private_status_5', '1', $products->private_status_5, array('class'=>'checkboxes')); }}
        </div>
        </div>  

        <div class="form-group">
        {{ Form::label('showcase_sort', 'Vitrin Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('showcase_sort',$products->showcase_sort,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('private_sort', 'Anasayfa Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('private_sort',$products->private_sort,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('category_sort', 'Kategori Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('category_sort',$products->category_sort,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('brand_sort', 'Marka Sırası', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('brand_sort',$products->brand_sort,['class'=>'form-control']) }}       
        </div>
        </div>                        

        <!-- 3 -->      

        </div>        
        <div role="tabpanel" class="tab-pane" id="seo">
            
        <!-- 4 -->

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#languageseo{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="languageseo{{ $language->language_id }}">           

            <div class="form-group">
            {{ Form::label('title', 'Sayfa Başlığı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][title]',$language->title,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('keyword', 'Anahtar Kelimeler', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 260 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][keyword]',$language->keyword,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            <div class="col-md-2 text-right">     
            {{ Form::label('description', 'Description (Açıklama)', array('class'=>'control-label')) }}     
            {{ Tooltip::standard('Maksimum 160 karakter olmalıdır.') }}    
            </div>
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][description]',$language->description,['class'=>'form-control']) }}       
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
        {{ Form::text('cargo_weight',$products->cargo_weight,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('supply_company_name', 'Tedarikçi Firma Adı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('supply_company_name',$products->supply_company_name,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('shelf_code', 'Raf Kodu', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Stok takibi için deponuzdaki özel numaralar') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('shelf_code',$products->shelf_code,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_ean', 'Barkod - EAN', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Avrupa Madde Numarası - 13 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_ean',$products->barcode_ean,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_upc', 'Barkod - UPC', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Evrensel Ürün Kodu - 12 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_upc',$products->barcode_upc,['class'=>'form-control']) }}       
        </div>
        </div>        

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('barcode_jan', 'Barkod - JAN', array('class'=>'control-label')); }}
        {{ Tooltip::standard('Japonya Madde numarası - 8/13 Hane') }}    
        </div>
        <div class="col-md-10">
        {{ Form::text('barcode_jan',$products->barcode_jan,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('created_at', 'Kayıt Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ $products->created_at->format('d.m.Y H:i') }}
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('updated_at', 'Güncelleme Tarihi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ $products->updated_at->format('d.m.Y H:i') }}
        </div>
        </div>

        <!-- 5 -->  

        </div>

    </div>
          
        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> KAYDET</button>
        </div>
        </div>
        
        {{ Form::close() }}

    </div>
  </div>
</div>
</div>


@stop