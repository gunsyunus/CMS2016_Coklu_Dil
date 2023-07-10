@extends('site.template')

@section('title', ''.$product->name.' '.$product->title.'')
@section('keyword', ''.$product->name.','.$product->keyword.'')
@section('description', ''.$product->name.' - '.$product->description.'')

@section('meta')
@stop

@section('body')
<script type="text/javascript" src="{{ URL::to('assets/js/cloud-zoom.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('assets/js/product.js') }}"></script>
@stop

@section('content')

<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="inner">
        <ul>
          <li class="home"> <a href="{{ URL::to($languageActive.'/') }}">{{ $settingsLanguage->home_name }}</a><span>&mdash;›</span></li>
          <li class=""><a href="{{ URL::to('urunler') }}">{{ $designsLanguage->product_title_text }}</a><span>&mdash;&rsaquo;</span></li>
          <li class="category13"><strong>{{ $product->name }}</strong></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
              <div class="product-img-box col-sm-4 col-xs-12">
                @if (!empty($product->promotion_text)) <div class="new-label new-top-left">{{ $product->promotion_text }}</div> @endif
                <div class="product-image" style="top:0px;z-index:700;position:relative;">

                <ul class="cloud_zoom" id="galleryproduct">        
             
                <li class="zoom_img">
                <img src="{{ URL::to($product->image_big_1) }}" class="zoom_img_image" />
                <img src="{{ URL::to($product->image_small_1) }}" class="zoom_source_image" />
                </li> 

                @foreach($galleries as $gallery)
                <li class="zoom_img" id="g{{ $gallery->id_gallery }}">
                <img src="{{ URL::to($gallery->image_big) }}" class="zoom_img_image" />
                <img src="{{ URL::to($gallery->image_small) }}" class="zoom_source_image" />
                </li>                
                @endforeach

                <div class="zoom-control"> <a href="javascript:void(0)" class="zoom-prev" style="right: 10.5px;">Geri</a> <a href="javascript:void(0)" class="zoom-next" style="right: 69.5px;">İleri</a></div>
                </ul>

                </div>       
                <div class="clear"></div>
              </div>
              <div class="product-shop col-sm-5 col-xs-12">
                <div class="product-next-prev">
      
                @if (empty($nextProduct->sef_url))
                <span class="product-next" style="color:#d8d8d8;"></span> 
                @else
                <a class="product-next" href="{{ Sef::productlang($nextProduct->sef_url,$nextProduct->id_product,$languageActive) }}"><span></span></a> 
                @endif


                @if (empty($prevProduct->sef_url))
                <span class="product-prev" style="color:#d8d8d8;"></span> 
                @else
                <a class="product-prev" href="{{ Sef::productlang($prevProduct->sef_url,$prevProduct->id_product,$languageActive) }}"><span></span></a> 
                @endif

                </div>
                <div class="product-name">
                  <h1>{{ $product->name }}</h1>
                </div><br>
                <div class="price-block">
                  <div class="price-box">
                    <p class="special-price"><span id="product-price-48" class="price">{{ $product->bname }}</span> </p>
                  </div>
                </div>
                <div class="short-description">
                  <br /><p>{{ $product->short_content }} </p>
                </div>                
                {{ Form::close() }}
              </div>
              <div class="product-img-box col-sm-3 col-xs-12">
                <div class="product-additional">
                  <div class="block block-product-additional">
                    <div class="block-title"><strong><span>{{ $designsLanguage->product_advert_title }}</span></strong></div>
                    <div class="block-content">{{ $designsLanguage->product_advert_content }}</div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="product-collateral">
          <div class="col-sm-12">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
              <li class="active"><a href="#product_tabs_description" data-toggle="tab">{{ Lang::get('content.product_detail') }} </a></li>
            </ul>
            <div id="productTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std">
                  <p>{{ $product->content }} </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Product Slider -->
@if ($designs->similar_product_section == 1)
<section class="slider-items-products">
  <div class="container">
    <div class="slider-items-products">
      <div class="new_title center">
        <h2>{{ $designsLanguage->similar_product_title }}</h2>
      </div>
      <div id="related-products-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4">          
          @foreach($similarProducts as $product)
          <div class="item">
            <div class="col-item">
              <div class="product-wrapper">
                <div class="thumb-wrapper"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" class="thumb flip"><span class="face"><img src="{{ URL::to($product->image_small_1) }}" alt="" width="170"></span><span class="quick-view" data-product_id="34"><span>{{ $product->name }}</span></span></a></div>
                <div class="actions"><span class="add-to-links"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" class="link-compare" title=""><span></span></a></span></div>
              </div>
              <div class="item-info">
                <div class="info-inner">
                    <div class="item-title"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" title="">{{ $product->name }}</a></div>
                  <div class="item-content">
                    <div class="item-price">
                      <div class="price-box">
                        <span class="regular-price"><span class="price">{{ $product->bname }}</span></span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          @endforeach 
        </div>
      </div>
    </div>
    </div>
</section>
@endif
<!-- End Product Slider -->

@stop