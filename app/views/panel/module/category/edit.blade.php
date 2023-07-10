@extends('panel.template')

@section('content')

@include('panel.module.category.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">KATEGORİYİ DÜZENLE</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        
        {{ Form::open(['url'=>'Pv3/category/save/'.$categories->id_category.'','role'=>'form','class'=>'form-horizontal']) }}

        <div class="form-group">
        {{ Form::label('sort', 'Sıralama', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
        {{ Form::text('sort',$categories->sort,['class'=>'form-control']) }}       
        </div>
        </div>

        <div class="form-group">
        {{ Form::label('name', 'Üst Kategorisi', array('class'=>'col-md-2 control-label')); }}
        <div class="col-md-10">
          <select name="categoryMain" class="form-control">
            <optgroup label="Seçili Kategori">
            @if (is_null($categories->parent_id))
               <option value="0" selected="selected">Yok</option>
            @else
                <option value="{{ $categories->parent_id }}" selected="selected">{{ $categoryMain->name }}</option>
            @endif
            </optgroup>
            <optgroup label="Yeni Kategori">
            @foreach($lists as $category)
              {{ NodeList::getSelect($category) }}
            @endforeach
            </optgroup>
          </select>
        </div>
        </div>

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
            {{ Form::label('name', 'Kategori Adı', array('class'=>'col-md-2 control-label')); }}
            <div class="col-md-10">
            {{ Form::text('languageField['.$language->language_id.'][name]',$language->name,['class'=>'form-control']) }}       
            </div>
            </div>                

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