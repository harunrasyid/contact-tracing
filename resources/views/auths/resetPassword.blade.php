<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Register | Sistem Pemantauan Kesehatan ITB</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2>Reset Password</h2>
                                <h5>Masukkan alamat email yang anda gunakan dalam proses pendftaran. Link reset password akan kami kirimkan ke email anda</h5>
                            </div>
                            <div class="panel-body">
                                <form action="/postReset" method="POST" novalidate>
                                	{{csrf_field()}}

									<div class="form-group{{$errors->has('email') ? 'has-error' : ' ' }}">
										<label class="form-label">Email</label>
										<label for="signin-email" class="control-label sr-only">Email yang terdaftar</label>
										<input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
										@if($errors->has('email'))
                                            <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                    	@endif
									</div>
                                                
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Kirim Email</button>
                                    </div>
				                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
