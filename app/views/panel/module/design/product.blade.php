@extends('panel.template')

@section('content')

@include('panel.module.design.menu',array('page'=>'Ürün Reklam Banner'))

@section('meta')
{{ HTML::style('panelv3/css/editor.min.css') }}
@stop

@section('body')
{{ HTML::script('panelv3/js/jquery.editor.min.js') }}
{{ HTML::script('panelv3/js/jquery.editor.tr.min.js') }}
@stop

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">ÜRÜN SAĞ REKLAM ALANI</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/design/productsave/','role'=>'form','class'=>'form-horizontal']) }}

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
            {{ Form::label('product_advert_title', 'Kutu Başlığı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][product_advert_title]',$language->product_advert_title,['class'=>'form-control']) }}       
            </div>
            </div>        

            <div class="form-group">
            {{ Form::label('product_advert_content', 'Kutu İçeriği', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">        
            {{ Form::textarea('languageField['.$language->language_id.'][product_advert_content]',$language->product_advert_content,['class'=>'editor']) }}
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