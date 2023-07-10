@extends('panel.template')

@section('content')

@include('panel.module.bannerBox.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">BANNER DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/banner-box/save/'.$banners->id_banner.'','role'=>'form','class'=>'form-horizontal','files'=>'true']) }}

        <div class="form-group">
        <div class="col-md-2 text-right">     
        {{ Form::label('image', 'Resim Seçiniz', array('class'=>'control-label')) }}     
        {{ Tooltip::standard('275 x 320 ölçülerinde ve JPG,PNG,GIF olmalıdır.') }}    
        </div>
        <div class="col-md-10">     
        <img src="{{ URL::to($banners->image) }}" class="banner img-thumbnail img-responsive" />
        {{ Form::file('image'); }}
        </div>
        </div>        

        <div class="form-group">
        {{ Form::label('status', 'Kutu Banner Durumu', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::checkbox('status', '1', $banners->status, array('class'=>'checkboxes')); }}
        </div>
        </div>            

        <div class="form-group">
        {{ Form::label('sort', 'Sıralama', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('sort',$banners->sort,['class'=>'form-control']) }}       
        </div>
        </div>           

        <ul class="nav nav-tabs col-md-offset-2" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#language{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="language{{ $language->language_id }}">             

            <div class="form-group">
            {{ Form::label('title', 'Kutu Banner Adı', array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][title]',$language->title,['class'=>'form-control']) }}
            </div>
            </div>      

            <div class="form-group">
            {{ Form::label('url', 'Kutu Banner Linki', array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][url]',$language->url,['class'=>'form-control']) }}       
            </div>
            </div>

            </div>                  
        @endforeach  
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