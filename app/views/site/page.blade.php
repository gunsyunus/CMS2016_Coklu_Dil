@extends('site.template')

@section('title', ''.$page->title.' - '.$settingsLanguage->title.'')
@section('keyword', ''.$page->keyword.'')
@section('description', ''.$page->description.'')

@section('meta')
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/magnific-popup.css') }}" />
@stop

@section('body')
<script type="text/javascript" src="{{ URL::to('assets/js/jquery.magnific-popup.min.js') }}"></script> 
<script type="text/javascript">
$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Lütfen bekleyiniz #%curr%...',
		mainClass: 'mfp-img-mobile',
		tClose: 'Kapat',
		tLoading: 'Yükleniyor...',		
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			tPrev: 'Geri',
			tNext: 'İleri',
			tCounter: '%curr% - %total%',
			preload: [0,1]
		},
		image: {
			tError: '<a href="%url%">Resim #%curr%</a> yüklenemedi !',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
});
</script>
@stop

@section('content')

<!-- Container -->

@if ($page->section_id == 0)

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ URL::to($languageActive.'/') }}">{{ $settingsLanguage->home_name }}</a><span>&mdash;›</span></li>
        <li class="category13"><strong>{{ $page->title }}</strong></li>
      </ul>
    </div>
  </div>
</div>

<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-12">
        <div class="page-title">
          <h2>{{ $page->title }}</h2>
        </div>
        <div class="static-contain">
        {{ $page->content }}  

			@if ($page->gallery_id != 0)
				<div class="popup-gallery">
		    	@foreach($galleries as $gallery)
					<a href="{{ URL::to($gallery->image_big) }}" title="{{ $page->title }}"><img src="{{ URL::to($gallery->image_small) }}" height="125" width="200" border="0" alt="{{ $page->title }}" class="img-thumbnail img-margin img-responsive" /></a>					
	    		@endforeach
	    		</div>
	    	@endif

        </div>
      </section>
    </div>
  </div>
</section>

@else

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ URL::to('/') }}">{{ $settingsLanguage->home_name }}</a><span>&mdash;›</span></li>
        <li class="home">{{ $section->name }}<span>&mdash;›</span></li>
        <li class="category13"><strong>{{ $page->title }}</strong></li>
      </ul>
    </div>
  </div>
</div>

<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9">
        <div class="page-title">
          <h2>{{ $page->title }}</h2>
        </div>
        <div class="static-contain">
        {{ $page->content }}  

			@if ($page->gallery_id != 0)
				<div class="popup-gallery">
		    	@foreach($galleries as $gallery)
					<a href="{{ URL::to($gallery->image_big) }}" title="{{ $page->title }}"><img src="{{ URL::to($gallery->image_small) }}" border="0" alt="{{ $page->title }}" class="img-thumbnail img-margin img-responsive" /></a>					
	    		@endforeach
	    		</div>
	    	@endif
	    	        
        </div>
      </section>
      <aside class="col-right sidebar col-sm-3">
        <div class="block block-company">
          <div class="block-title">{{ $section->name }}</div>
          <div class="block-content">
            <ol id="recently-viewed-items">
              @foreach($pageList as $list)
                <li class="item even"><a href="{{ Sef::pagelang($list->sef_url,$languageActive) }}">{{ $list->title }}</a></li>
              @endforeach
              </ol>
            <br />
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

@endif

<!-- Container --> 

@stop