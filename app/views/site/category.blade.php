@extends('site.template')

@section('title', ''.$category->name.' '.$category->title.'')
@section('keyword', ''.$category->name.','.$category->keyword.'')
@section('description', ''.$category->name.' - '.$category->description.'')

@section('meta')
@stop

@section('body')
@stop

@section('content')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="inner">
        <ul>
          <li class="home"><a href="{{ URL::to($languageActive.'/') }}">{{ $settingsLanguage->home_name }}</a><span>&mdash;›</span></li>          
          <li class=""><a href="{{ URL::to('urunler') }}">{{ $designsLanguage->product_title_text }}</a><span>&mdash;&rsaquo;</span></li>
          <li class="category13"><strong>{{ $category->name }}</strong></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<section class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3">
        <article class="col-main">
          <div class="page-title">
          </div>
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme" style="opacity: 1; display: block;"> 
                 @foreach($bannerSlider as $banner)
                  <div class="item"> 
                    <a href="{{ URL::to($banner->url) }}"><img alt="{{ $banner->title }}" src="{{ URL::to($banner->image) }}"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading">{{ $banner->title }}</h2>
                      <p>{{ $banner->text }}</p>
                    </div>
                  </div>               
                  @endforeach
                </div>
              </div>
            </div>
            
          </div>
          <div class="category-products pull-left">
            <ul class="pdt-list products-grid zoomOut play">
              @foreach($products as $product)
              <li class="item item-animate last">
                <div class="item-inner">
                  <div class="product-wrapper">
                    <div class="thumb-wrapper">                    
                      @if (!empty($product->promotion_text)) <div class="new-label new-top-left">{{ $product->promotion_text }}</div> @endif
                      
                    <div class="thumb-wrapper"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" class="thumb"><span class="face"><img src="{{ URL::to($product->image_small_1) }}" alt="" width="250"></span><span class="quick-view" data-product_id="34"><span>{{ $product->name }}</span></span></a></div>
                    <div class="actions"><span class="add-to-links"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" class="link-compare" title=""><span></span></a></span></div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title"><a href="{{ Sef::productlang($product->sef_url,$product->id_product,$languageActive) }}" title="">{{ $product->name }}</a></div>
                      <div class="item-content">
                        <div class="item-price">
                          <div class="price-box">
                            <span class="regular-price"><span class="price">{{ $product->bname }}</span></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </article>
      </div>
      <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9"> 
        <aside class="col-left sidebar">

          <div class="side-nav-categories">
            <div class="block-title">{{ $designsLanguage->product_title_text }}</div>
            <div class="box-content box-category">
              <ul id="magicat">
              @foreach($categories as $category)      
                {{ NodeList::getAccordionMenu($category,$languageActive) }}
              @endforeach
              </ul>
            </div>
          </div>

        </aside>
      </div>
    </div>
  </div>
</section>

@stop