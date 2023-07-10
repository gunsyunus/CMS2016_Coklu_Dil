<div class="modul-header">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <h1><i class="fa fa-star fa-fw"></i>TASARIM</h1>
    <ol class="breadcrumb hidden-xs">
      <li><a href="{{ URL::to('Pv3/Dashboard') }}">Anasayfa</a></li>
      <li><a href="#">Tasarım Yönetimi</a></li>
      <li class="active">{{ $page }}</li>
    </ol>
  </div>
</div>
</div>

@if(Session::has('alertTitle'))
  <div class="alert alert-{{Session::get("alertClass")}} alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>@if (Session::get("alertClass")=='success') <i class="fa fa-info-circle"></i> @elseif (Session::get("alertClass")=='danger') <i class="fa fa-times-circle"></i> @endif {{Session::get("alertTitle")}}</strong> {{Session::get("alertMessage")}}
  </div>
@endif