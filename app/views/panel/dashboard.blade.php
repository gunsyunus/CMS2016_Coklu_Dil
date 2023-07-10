@extends('panel.template')

@section('content')

@section('body')
{{ HTML::script('panelv3/js/chart.min.js') }}
@stop
    
<div class="modul-header">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <h1><i class="fa fa-home fa-fw"></i>ANASAYFA</h1>
    <ol class="breadcrumb hidden-xs">
      <li><a href="{{ URL::to('Pv3/Dashboard') }}">Yönetim Paneli Anasayfa</a></li>
    </ol>  
  </div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-4">
    <div class="statistic">     
      <div class="circle orange"><i class="fa fa-user"></i></div>
      <p><b>{{ $statistics->user }}</b> YÖNETİCİ <span>Sistemdeki toplam yöneticiler</span></p>
    </div>
  </div>
  <div class="col-xs-12 col-sm-8 col-md-8">
    <div class="statistic">
      <div class="circle orange"><i class="fa fa-file-text"></i></div>
      <p><b>{{ $statistics->page }}</b> SAYFA<span>Aktif sayfa sayınız</span></p>
    </div>
  </div>
</div>

<div class="row row-space">
  <div class="col-xs-12 col-sm-4 col-md-4">

  <!-- Log -->
  <div class="panel panel-default panel-plus-margin">
    <div class="panel-heading">
      <h3 class="panel-title panel-modul">YÖNETİCİ LOGLARI <span class="badge badge-right">Son 5 Kayıt</span></h3>
    </div>
    <div class="panel-body">
      <div class="row">
      <div class="col-md-12">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>IP Adresi</th>        
          <th>İşlem Tipi</th>
        </tr>
      </thead>
      <tbody>
      @foreach($logs as $log)
        <tr>
          <td>{{ $log->ip }}</td>
          <td>{{ $log->process_text }}</td>         
        </tr> 
      @endforeach      
      </tbody>
      </table>
      </div>
      </div>
    <a href="{{ URL::to('Pv3/user') }}" class="btn btn-default btn-lg btn-block">Yönetici Listesi</a>
    </div>
  </div>
  <!-- Log End -->

  </div>
  <div class="col-xs-12 col-sm-8 col-md-8">

  <!-- page -->
  <div class="panel panel-primary panel-plus-margin">
    <div class="panel-heading">
      <h3 class="panel-title panel-modul panel-white">AKTİF SAYFALARINIZ <span class="badge badge-right">Son 5 Sayfa</span></h3>
    </div>
    <div class="panel-body">
      <div class="row">
      <div class="col-md-12">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Başlık</th>
          <th>Linki</th>
        </tr>
      </thead>
      <tbody>
      @foreach($pages as $page)
        <tr>
          <td>{{ $page->pagelanguage->title }}</td>
          <td>{{ Sef::page($page->pagelanguage->sef_url) }}</td>        
        </tr> 
      @endforeach      
      </tbody>
      </table>
      </div>
      </div>
    <a href="{{ URL::to('Pv3/page') }}" class="btn btn-default btn-lg btn-block">Tüm Sayfalar</a>
    </div>
  </div>
  <!-- page End -->

  </div>  
</div>

@stop