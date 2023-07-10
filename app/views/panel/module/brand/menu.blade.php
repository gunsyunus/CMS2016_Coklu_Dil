<div class="modul-header">
<div class="row">
  <div class="col-xs-8 col-sm-6 col-md-8">
    <h1><i class="fa fa-tag fa-fw"></i>MARKALAR</h1>
    <ol class="breadcrumb hidden-xs">
      <li><a href="{{ URL::to('Pv3/Dashboard') }}">Anasayfa</a></li>
      <li><a href="#">Ürün Yönetimi</a></li>
      <li class="active">Markalar</li>
    </ol>  
  </div>
  <div class="col-xs-4 col-sm-6 col-md-4 modul-button">
    <a class="btn btn-success" href="{{ URL::to('Pv3/brand/new') }}"><i class="fa fa-plus-circle"></i> Marka</a>
    <a class="btn btn-info" href="{{ URL::to('Pv3/brand') }}"><i class="fa fa-list"></i> Liste</a>
  </div>
</div>
</div>

@if(Session::has('alertTitle'))
  <div class="alert alert-{{Session::get("alertClass")}} alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>@if (Session::get("alertClass")=='success') <i class="fa fa-info-circle"></i> @elseif (Session::get("alertClass")=='danger') <i class="fa fa-times-circle"></i> @endif {{Session::get("alertTitle")}}</strong> {{Session::get("alertMessage")}}
  </div>
@endif