@extends('panel.template')

@section('content')

@include('panel.module.design.menu',array('page'=>'Metinler'))

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">METİNLER</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    {{ Form::open(['url'=>'Pv3/design/textsave/','role'=>'form','class'=>'form-horizontal']) }}

        <ul class="nav nav-tabs" role="tablist">
        @foreach($languages as $language)
            <li role="presentation" @if($language->language_id=='1') class="active" @endif><a href="#language{{ $language->language_id }}" aria-controls="language{{ $language->language_id }}" role="tab" data-toggle="tab"><img src="{{ URL::to($language->language->image_flag) }}" class="language img-thumbnail img-responsive" /></a></li>
        @endforeach
        </ul>

        <br />

        <div class="tab-content">
        @foreach($languages as $language)
            <div role="tabpanel" class="tab-pane @if($language->language_id=='1') active @endif" id="language{{ $language->language_id }}">


    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#header{{ $language->language_id }}" aria-controls="header{{ $language->language_id }}" role="tab" data-toggle="tab">Anasayfa Banner Altı</a></li>
        <li role="presentation"><a href="#footer{{ $language->language_id }}" aria-controls="footer{{ $language->language_id }}" role="tab" data-toggle="tab">Anasayfa Footer Üstü</a></li>
        <li role="presentation"><a href="#hometab{{ $language->language_id }}" aria-controls="hometab{{ $language->language_id }}" role="tab" data-toggle="tab">Anasayfa Tab ve Linkler</a></li>
        <li role="presentation"><a href="#product{{ $language->language_id }}" aria-controls="product{{ $language->language_id }}" role="tab" data-toggle="tab">Ürünler</a></li>
    </ul>

    <br />

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="header{{ $language->language_id }}">

        <!-- 1 -->

        <div class="form-group">
        {{ Form::label('home_text_1', 'Metin Kutusu - 1', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_1]',$language->home_text_1,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_2]',$language->home_text_2,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_text_3', 'Metin Kutusu - 2', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_3]',$language->home_text_3,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_4]',$language->home_text_4,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_text_5', 'Metin Kutusu - 3', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_5]',$language->home_text_5,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_6]',$language->home_text_6,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_text_8', 'Metin Kutusu - 4', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_7]',$language->home_text_7,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_8]',$language->home_text_8,['class'=>'form-control']) }}       
        </div>        
        </div>                        

        <!-- 1 -->                

        </div>
        <div role="tabpanel" class="tab-pane" id="footer{{ $language->language_id }}">
            
        <!-- 2 -->

        <div class="form-group">
        {{ Form::label('home_text_9', 'Metin Kutusu - 1', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_9]',$language->home_text_9,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_10]',$language->home_text_10,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_text_11', 'Metin Kutusu - 2', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_11]',$language->home_text_11,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_12]',$language->home_text_12,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_text_13', 'Metin Kutusu - 3', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_text_13]',$language->home_text_13,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_text_14]',$language->home_text_14,['class'=>'form-control']) }}       
        </div>        
        </div>             

        <!-- 2 -->      

        </div>
        <div role="tabpanel" class="tab-pane" id="product{{ $language->language_id }}">
            
        <!-- 4 -->    

        <div class="form-group">
        {{ Form::label('product_title_text', 'Ürünler Başlık', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('languageField['.$language->language_id.'][product_title_text]',$language->product_title_text,['class'=>'form-control']) }}       
        </div>
        </div>
        
        <div class="form-group">
        {{ Form::label('similar_product_title', 'Benzer Ürünler Başlığı', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('languageField['.$language->language_id.'][similar_product_title]',$language->similar_product_title,['class'=>'form-control']) }}       
        </div>
        </div>  

        <!-- 4 -->      

        </div>        

        <div role="tabpanel" class="tab-pane" id="hometab{{ $language->language_id }}">
            
        <!-- 5 -->

        <div class="form-group">
        {{ Form::label('home_tab_text_1', 'Anasayfa Tab', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_1]',$language->home_tab_text_1,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_2]',$language->home_tab_text_2,['class'=>'form-control']) }}       
        </div>        
        </div>

        <div class="form-group">
        {{ Form::label('home_tab_text_3', 'Anasayfa Alt Tab', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-4">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_3]',$language->home_tab_text_3,['class'=>'form-control']) }}       
        </div>
        <div class="col-md-6">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_4]',$language->home_tab_text_4,['class'=>'form-control']) }}       
        </div>        
        </div>        

        <div class="form-group">
        {{ Form::label('home_tab_text_5', 'Anasayfa Geniş Bant Ürünler', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_5]',$language->home_tab_text_5,['class'=>'form-control']) }}       
        </div>
        </div>      

        <div class="form-group">
        {{ Form::label('home_tab_text_6', 'Anasayfa Alt Banner', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('languageField['.$language->language_id.'][home_tab_text_6]',$language->home_tab_text_6,['class'=>'form-control']) }}       
        </div>
        </div>      

        <div class="form-group">
        {{ Form::label('home_link', 'İletişim Linki', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('languageField['.$language->language_id.'][home_link]',$language->home_link,['class'=>'form-control']) }}       
        </div>
        </div>

        <!-- 5 -->      

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