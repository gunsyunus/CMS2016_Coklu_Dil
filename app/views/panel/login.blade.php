<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ Lang::get('software.title') }}</title>
	{{ HTML::style('panelv3/css/bootstrap.min.css') }}
	{{ HTML::style('panelv3/css/bootstrap-theme.min.css') }}
	{{ HTML::style('panelv3/css/login.min.css') }}
	{{ HTML::style('panelv3/css/font-awesome.min.css') }}
</head>
<body>	
	<div class="container">
	<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">{{ Lang::get('software.title') }}</h3>
            </div>
            <div class="panel-body">         
                {{ Form::open(['url'=>'Pv3/login','role'=>'form','class'=>'form-signin']) }}
                    <img src="{{ URL::to('panelv3/img') }}/login.png" width="125">
    	    		<h2 class="form-signin-heading">Yönetici Girişi</h2>
		            <div class="icon-addon addon-lg">
        				<input type="text" class="form-control" placeholder="Yönetici Adı" name="email" required>
                	    <label for="kullanici" class="glyphicon glyphicon-user"></label>
                	</div>
	                <div class="icon-addon addon-lg">
    	    			<input type="password" class="form-control" placeholder="Şifre" name="password" required>
        	            <label for="sifre" class="glyphicon glyphicon-lock"></label>
            	    </div>
        			<button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
		    	{{ Form::close() }}
            </div>
           <div class="panel-footer">{{ Lang::get('software.copyright') }}</div>
          </div>
                    @if(Session::has('alertTitle'))
                    <div class="alert alert-{{Session::get("alertClass")}} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{Session::get("alertTitle")}}</strong> {{Session::get("alertMessage")}}
                    </div>
                    @endif      
                    @if (isset($logout))
                    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>BAŞARIYLA,</strong> GÜVENLİ ÇIKIŞ YAPILDI
                    </div>
                    @endif
        </div>
	</div>
	</div>
    {{ HTML::script('panelv3/js/jquery-1.11.3.min.js') }}	
    {{ HTML::script('panelv3/js/bootstrap.min.js') }}
</body>
</html>