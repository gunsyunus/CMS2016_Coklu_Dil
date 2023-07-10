@extends('panel.template')

@section('content')

@include('panel.module.section.menu')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title panel-modul">BÖLÜM LİSTESİ <span class="badge">{{ $sections->getTotal() }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Bölüm Adı</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
     	@foreach($sections as $section)
        <tr>
          <th>{{ $section->id_section }}</th>
          <td>{{ $section->sectionlanguage->name }}</td>
          <td class="text-right">            
          <div class="btn-group">
          <a href="{{ URL::to('Pv3/section/edit/'.$section->id_section.'') }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Menü</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
          <li class="delete"><a href="{{ URL::to('Pv3/section/delete/'.$section->id_section.'') }}"><i class="fa fa-times"></i> Bölümü Sil</a></li>
          </ul>
          </div>
          </td>
        </tr> 
   	  @endforeach      
      </tbody>
    </table>
   	<div class="pagination"> {{ $sections->links() }} </div>
    </div>
    </div>
  </div>
</div>

@stop