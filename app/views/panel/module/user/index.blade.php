@extends('panel.template')

@section('content')

@include('panel.module.user.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">YÖNETİCİ LİSTESİ <span class="badge">{{ $users->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Yönetici Adı Soyadı</th>
          <th>E-Posta</th>
          <th>Son Güncelleme</th>          
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($users as $user)
        <tr>
          <td>{{ $user->name }} {{ $user->surname }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->updated_at->format('d.m.Y H:i') }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/user/edit/'.$user->id_user.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{ URL::to('Pv3/user/logs/'.$user->id_user.'') }}"><i class="fa fa-caret-square-o-right"></i> İşlem Kayıtları</a></li>
          <li><a href="{{ URL::to('Pv3/user/password/'.$user->id_user.'') }}"><i class="fa fa-lock"></i> Şifreyi Değiştir</a></li>         
          <li role="separator" class="divider"></li>
          <li class="delete"><a href="{{ URL::to('Pv3/user/delete/'.$user->id_user.'') }}"><i class="fa fa-times"></i> Yöneticiyi Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $users->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop