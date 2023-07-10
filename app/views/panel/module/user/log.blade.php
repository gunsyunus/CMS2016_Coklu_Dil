@extends('panel.template')

@section('content')

@include('panel.module.user.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul"><b>KAYIT LİSTESİ :</b> {{ $users->name }} {{ $users->surname }} - {{ $users->email }} <span class="badge">{{ $logs->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>İşlem Tarihi</th>
          <th>İşlem</th>
          <th>IP Adresi</th>          
          <th>Kayıtlı E-Posta</th>          
        </tr>
      </thead>
      <tbody>
     	@foreach($logs as $log)
        <tr>
          <td>{{ $log->process_at->format('d.m.Y H:i') }}</td>
          <td>{{ $log->process_text }}</td>
          <td>{{ $log->ip }}</td>
          <td>{{ $log->user_email }}</td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $logs->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop