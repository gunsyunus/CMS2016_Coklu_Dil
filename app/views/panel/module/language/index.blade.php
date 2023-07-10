@extends('panel.template')

@section('content')

@include('panel.module.language.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">DİLLER <span class="badge">{{ $languages->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sıralama</th>
          <th>Dil Adı</th>
          <th>Dil Kodu</th>
          <th>Resim</th>
          <th>Durumu</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($languages as $language)
        <tr>
          <th>{{ $language->sort }}</th>
          <td>{{ $language->name }}</td>
          <td>{{ $language->language_code }}</td>          
          <td><img src="{{ URL::to($language->image_flag) }}" class="language img-thumbnail img-responsive" /></td>          
          <td>{{ $language->status=='1' ? '<span class="label label-success">AKTİF</span>' : '<span class="label label-danger">PASİF</span>' }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/language/edit/'.$language->id_language.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/language/delete/'.$language->id_language.'') }}"><i class="fa fa-times"></i> Dil Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $languages->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop