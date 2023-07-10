@extends('site.template')

@section('title', ''.$settingsLanguage->contact_page_name.' - '.$settingsLanguage->title.'')
@section('keyword', ''.$settingsLanguage->contact_page_name.','.$settingsLanguage->keyword.'')
@section('description', ''.$settingsLanguage->contact_page_name.' - '.$settingsLanguage->description.'')

@section('meta')
@stop

@section('body')
@stop

@section('content')


{{ $settingsLanguage->contact_map }}

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="inner">
        <ul>
          <li class="home"><a href="{{ URL::to($languageActive.'/') }}">{{ $settingsLanguage->home_name }}</a><span>&mdash;›</span></li>          
          <li class="category13"><strong>{{ $settingsLanguage->contact_page_name }}</strong></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">

      <aside class="col-right sidebar col-sm-6">
        <div class="page-title">
          <h2> {{ $settingsLanguage->contact_title_left }}</h2>
        </div>
        <br />
        <div class="block">

      {{ $settingsLanguage->contact_info }}

        </div>
      </aside>

     {{ Form::open(['url'=>'gonder','role'=>'form','class'=>'form-horizontal']) }}

      <section class="col-main col-sm-6">
        <div class="page-title">
          <h2> {{ $settingsLanguage->contact_title_right }}</h2>
        </div>

                @if(Session::has('CONFIRM'))
                 <div class="alert alert-success" role="alert">{{ Lang::get('content.form_success') }}</div>
                @endif

                @if(Session::has('ERROR'))                  
                 <div class="alert alert-danger" role="alert">{{ Lang::get('content.form_error') }}</div>
                @endif  

        <div class="static-contain">
          <fieldset class="group-select">
            <ul>
              <li id="billing-new-address-form">
                <fieldset>
                  <legend>{{ $settingsLanguage->contact_page_name }}</legend>
                  <ul>
                    <li>
                      <div class="customer-name">
                        <div class="input-box name-firstname">
                          <label for="name"><b>{{ Lang::get('content.form_name') }}</b> <span class="required">*</span></label>
                          <br>
                          <input type="text" id="name" name="name" title="" class="input-text ">
                        </div>

                      <div class="input-box">
                        <label for="phone"><b>{{ Lang::get('content.form_phone') }}</b> <span class="required">*</span></label>
                        <br>
                        <input type="text" name="phone" id="phone" title="" class="input-text">
                      </div>                        

                      </div>
                    </li>
                    <li>
                        <div class="input-box name-lastname">
                          <label for="email"><b>{{ Lang::get('content.form_email') }}</b></label>
                          <br>
                          <input type="text" id="email" name="email" title="" class="input-text">
                        </div>
                    </li>
                    <li class="">
                      <label for="message"><b>{{ Lang::get('content.form_message') }}</b></label>
                      <br>
                      <div style="float:none" class="">
                        <textarea name="message" id="message" title="" class="input-text" cols="5" rows="3"></textarea>
                      </div>
                    </li>
                  </ul>
                </fieldset>
              </li>
              <div class="buttons-set">
                <button type="submit" title="{{ Lang::get('content.form_send') }}" class="button submit"> <span> {{ Lang::get('content.form_send') }} </span> </button>
              </div>
            </ul>
          </fieldset>
        </div>
      </section>

      {{ Form::close() }}

    </div>
  </div>
</section>

@stop