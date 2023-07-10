<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="keyword" content="@yield('keyword')" />
<meta name="description" content="@yield('description')" />
<meta name="author" content="{{ Lang::get('software.copyright') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<link rel="shortcut icon" type="image/png" href="{{ URL::to($designs->favicon_logo) }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/font-awesome.css') }} " media="all" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css') }} " media="all" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/slider.css') }} " media="all" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/owl.carousel.css') }} " />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/owl.theme.css') }} " />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600" rel="stylesheet" type="text/css" />
@yield('meta')
{{ $settings->tracing_head_code }}
</head>
<body class="cms-index-index cms-home-page">
{{ $settings->tracing_body_after_code }}

<!-- Header -->
<header>
  <div class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-xs-6">            
            <div class="welcome-msg hidden-xs">{{ $settingsLanguage->welcome_msg }}</div>
          </div>
          <div class="col-sm-8 col-xs-6">
            <div class="toplinks">
               <div class="links">                
                @foreach($languages as $language)
                  <a href="{{ URL::to($language->language_code) }}"><img src="{{ URL::to($language->image_flag) }}" class="language img-thumbnail img-responsive" alt="{{ $language->name }}"/></a>          
                @endforeach  
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6"> 
          <!-- Logo -->
          <div class="logo"><a href="{{ URL::to($languageActive.'/') }}"><img alt="{{ $settingsLanguage->title }}" src="{{ URL::to($designs->logo) }}" border="0" /></a></div>
          <!-- Logo --> 
        </div>
        <div class="col-lg-6"> 
          <!-- Search -->
          <div class="search-box pull-right">
            <form action="{{ URL::to($languageActive.'/q') }}" method="get" id="search_mini_form" name="Categories">
              <input type="text" placeholder="{{ $settingsLanguage->search_name }}" maxlength="70" name="k" id="search">
              <button type="submit" class="btn btn-default search-btn-bg"> <span class="glyphicon glyphicon-search"></span>&nbsp;</button>
            </form>
          </div>
          <!-- Search --> 
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Header --> 

<!-- Navbar -->
<nav>
  <div class="container">
    <div class="row">
      <div class="nav-inner"> 

        <!-- Mobile Menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>Menu</h2>
              </div>
              <ul style="display:none;" class="submenu">
                <li>
                  <ul class="topnav">
                  @foreach($menus as $menu)

		    @if ($menu->type == 'single')
              	    <li class="level0 nav-8 level-top"><a href="{{ URL::to($menu->url) }}" class="level-top"><span>{{ $menu->name }}</span></a></li>

                    @elseif ($menu->type == 'dropdown')
                    <li class="level0 nav-11 level-top parent"> <a class="level-top" href="{{ URL::to($menu->url) }}"> <span>{{ $menu->name }}</span> </a>
                      <ul class="level0">
                      @foreach(MenuList::dropdown($menu->tree) as $sub)
                        <li class="level1 nav-10-1"><a href="{{ URL::to($sub['url']) }}"><span>{{ $sub['name'] }}</span></a></li>
                      @endforeach
                      </ul>
                    </li>

                    @elseif ($menu->type == 'three')
                    <li class="level0 nav-9 level-top "> <a class="level-top" href="{{ URL::to($menu->url) }}"> <span>{{ $menu->name }}</span> </a>
                      <ul class="level0">
                        @foreach(MenuList::dropdown($menu->tree) as $sub)
                        <li class="level1 nav-9-1 first"> <a href="{{ URL::to($sub['url']) }}"> <span>{{ $sub['name'] }}</span> </a>
                          <ul class="level1">
                          @foreach($sub['child'] as $child)
                            <li class="level2 nav-9-1-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                          @endforeach
                          </ul>
                        </li>
                       @endforeach
                      </ul>
                    </li>
                   
                    @elseif ($menu->type == 'four')
                    <li class="level0 nav-8 level-top parent"> <a class="level-top" href="{{ URL::to($menu->url) }}"> <span>{{ $menu->name }}</span> </a>
                      <ul class="level0">
                        @foreach(MenuList::dropdown($menu->tree) as $sub)
                        <li class="level1 nav-9-1 first"> <a href="{{ URL::to($sub['url']) }}"> <span>{{ $sub['name'] }}</span> </a>
                          <ul class="level1">
                          @foreach($sub['child'] as $child)
                            <li class="level2 nav-9-1-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                          @endforeach
                          </ul>
                        </li>
                       @endforeach
                      </ul>
                    </li>

                    @elseif ($menu->type == 'five')
                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="{{ URL::to($menu->url) }}"> <span>{{ $menu->name }}</span> </a>
                      <ul class="level0">
                        @foreach(MenuList::dropdown($menu->tree) as $sub)
                        <li class="level1 nav-9-1 first"> <a href="{{ URL::to($sub['url']) }}"> <span>{{ $sub['name'] }}</span> </a>
                          <ul class="level1">
                          @foreach($sub['child'] as $child)
                            <li class="level2 nav-9-1-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                          @endforeach
                          </ul>
                        </li>
                       @endforeach
                      </ul>
                    </li>

                    @endif
                  @endforeach
                  </ul>
                </li>
              </ul>              
            </li>
          </ul>
        </div>        
        <!-- End Mobile Menu -->

        <ul id="nav" class="hidden-xs">
         @foreach($menus as $menu)
            
            @if ($menu->type == 'single')
              <li class="level0 nav-8 level-top"><a href="{{ URL::to($menu->url) }}" class="level-top"><span>{{ $menu->name }}</span></a></li>

            @elseif ($menu->type == 'dropdown')
              <li class="level0 parent drop-menu"><a href="{{ URL::to($menu->url) }}"><span>{{ $menu->name }}</span> </a> 
              <ul class="level1">
                @foreach(MenuList::dropdown($menu->tree) as $sub)
                <li class="level1 nav-10-1"><a href="{{ URL::to($sub['url']) }}"><span>{{ $sub['name'] }}</span></a></li>
                @endforeach
              </ul>
              </li>

            @elseif ($menu->type == 'image')
            <li class="nav-custom-link level0 level-top parent"> <a class="level-top" href="{{ URL::to($menu->url) }}"><span>{{ $menu->name }}</span></a>
              <div class="level0-wrapper custom-menu">
              <div class="header-nav-dropdown-wrapper clearer">
                @foreach(MenuList::dropdown($menu->tree) as $sub)
                <div class="grid12-5">
                  <div class="custom_img"> <a href="{{ URL::to($sub['url']) }}"><img src="{{ URL::to($sub['image']) }}" alt="{{ $sub['name'] }}"></a></div>
                  <p>{{ $sub['name'] }}</p>
                </div>
                @endforeach
              </div>
              </div>
            </li>

            @elseif ($menu->type == 'three')
            <li class="level0 nav-7 level-top parent"> <a class="level-top" href="{{ URL::to($menu->url) }}"> <span>{{ $menu->name }}</span> </a>
              <div class="level0-wrapper dropdown-6col">
              <div class="level0-wrapper2">
                <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
                  <ul class="level0">
                    @foreach(MenuList::dropdown($menu->tree) as $sub)                
                    <li class="level1 nav-7-1 first parent item"> <a href="{{ URL::to($sub['url']) }}"> <span>{{ $sub['name'] }}</span> </a> 
                      <ul class="level1">
                      @foreach($sub['child'] as $child)
                      <li class="level2 nav-7-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                      @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="nav-block nav-block-right std grid12-4"><a href="{{ URL::to($menu->url) }}"><img src="{{ URL::to($menu->image) }}" class="fade-on-hover" alt="{{ $menu->name }}" /></a> </div>
              </div>
              </div>
            </li>    

            @elseif ($menu->type == 'four')
            <li class="level0 nav-6 level-top parent"> <a href="{{ URL::to($menu->url) }}" class="level-top"> <span>{{ $menu->name }}</span> </a>
            <div class="level0-wrapper dropdown-6col">
              <div class="level0-wrapper2">
                <div class="nav-block nav-block-center grid13-8 itemgrid itemgrid-4col">
                  <ul class="level0">
                    @foreach(MenuList::dropdown($menu->tree) as $sub)                
                    <li class="level1 nav-7-1 first parent item"> <a href="{{ URL::to($sub['url']) }}"> <span>{{ $sub['name'] }}</span> </a> 
                      <ul class="level1">
                      @foreach($sub['child'] as $child)
                      <li class="level2 nav-7-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                      @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="nav-block nav-block-right std grid12-3"> <a class="product-image" title="" href="{{ URL::to($menu->url) }}"> <img alt="{{ $menu->name }}" src="{{ URL::to($menu->image) }}" width="200"></a>
                </div>
              </div>
            </div>
            </li>            

            @elseif ($menu->type == 'five')
            <li class="level0 nav-7 level-top parent"><a href="{{ URL::to($menu->url) }}" class="level-top"><span>{{ $menu->name }}</span></a>
            <div class="level0-wrapper dropdown-6col">
              <div class="level0-wrapper2">
                <div class="nav-block nav-block-center">
                  <ul class="level0">
                    @foreach(MenuList::dropdown($menu->tree) as $sub)
                    <li class="level1 nav-6-1 parent item">
                      <div class="cat-img"><img alt="{{ $sub['name'] }}" src="{{ URL::to($sub['image']) }}"></div>
                      <a href="{{ URL::to($sub['url']) }}"><span>{{ $sub['name'] }}</span></a> 
                      <ul class="level1">
                        @foreach($sub['child'] as $child)
                        <li class="level2 nav-7-1"><a href="{{ URL::to($child['url']) }}"><span>{{ $child['name'] }}</span></a></li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            </li>            

            @endif        

         @endforeach
        </ul>

        <div class="top-cart-contain pull-right"> 
          <!-- Phone -->
          <div class="mini-cart">
            <div class="basket dropdown-toggle">
              <a href="{{ URL::to($designsLanguage->home_link) }}">
              <i class="glyphicon glyphicon-earphone"></i>
              <div class="cart-box"><span class="title">{{ $designsLanguage->footer_contact_2 }}</span></div>
              </a></div>
            <div>
            </div>
          </div>
          <!-- End Phone -->
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- end nav --> 

@yield('content')

<!-- Footer -->
<footer>  
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
          <div class="footer-column-1 pull-left">
            <div class="footer-logo"><a href="{{ URL::to($languageActive.'/') }}" title="{{ $settingsLanguage->title }}"><img src="{{ URL::to($designs->footer_logo) }}" alt="{{ $settingsLanguage->title }}" /></a></div>
            <p>{{ $designsLanguage->footer_slogan }}</p>
               <div class="social">
               <ul class="link">
                @if ($settings->social_facebook_url!='') <li class="fb pull-left"><a href="{{ $settings->social_facebook_url }}"></a></li> @endif
                @if ($settings->social_twitter_url!='') <li class="tw pull-left"><a href="{{ $settings->social_twitter_url }}"></a></li> @endif
                @if ($settings->social_google_url!='') <li class="googleplus pull-left"><a href="{{ $settings->social_google_url }}"></a></li> @endif
                @if ($settings->social_linkedin_url!='') <li class="linkedin pull-left"><a href="{{ $settings->social_linkedin_url }}"></a></li> @endif
                @if ($settings->social_youtube_url!='') <li class="youtube pull-left"><a href="{{ $settings->social_youtube_url }}"></a></li> @endif
                @if ($settings->social_instagram_url!='') <li class="ins pull-left"><a href="{{ $settings->social_instagram_url }}"></a></li> @endif
               </ul>
               </div>
          </div>
        </div>
        @foreach($footers as $menu)
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
          <div class="footer-column pull-left">
            <h4>{{ $menu->name }}</h4>
            <ul class="links">
                @foreach(MenuList::dropdown($menu->tree) as $sub)
                <li><a href="{{ URL::to($sub['url']) }}">{{ $sub['name'] }}</a></li>
                @endforeach
            </ul>
          </div>
        </div>
        @endforeach
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="footer-column-last pull-left">
            <h4>{{ $designsLanguage->home_title_1 }}</h4>
            <address><i class="add-icon"></i>{{ $designsLanguage->footer_contact_1 }}</address>
            <div class="phone-footer"><i class="phone-icon"></i> {{ $designsLanguage->footer_contact_2 }}</div>
            <div class="email-footer"><i class="email-icon"></i> <a href="mailto:{{ $designsLanguage->footer_contact_3 }}">{{ $designsLanguage->footer_contact_3 }}</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-5 col-xs-12 coppyright">{{ $settingsLanguage->copyright }} </div>
        <div class="col-sm-7 col-xs-12 company-links">
          <ul class="links">
            <li class="last"><a title="E-Ticaret" href="{{ Lang::get('software.link') }}">{{ Lang::get('software.name') }}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer --> 

<script type="text/javascript" src="{{ URL::to('assets/js/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/js/common.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/js/slider.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/js/owl.carousel.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/js/mask.js') }}"></script> 
<script type="text/javascript">
//<![CDATA[
jQuery(function() {
jQuery(".slideshow").cycle({
fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0, 			pager: '#home-slides-pager',
prev: '#home-slides-prev',
next: '#home-slides-next'
});
});
//]]>
</script>
@yield('body')
{{ $settings->tracing_body_before_code }}
</body>
</html>
