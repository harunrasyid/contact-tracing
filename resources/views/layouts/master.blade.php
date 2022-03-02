<!doctype html>
<html lang="en">

<head>
	<title>Sistem Pemantauan Kesehatan Mahasiswa ITB</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.includes._navbar')
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
        @include('layouts.includes._sidebar')
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
        @yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	

	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('admin/assets/plugin/hide-show-fields-form.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/assets/plugin/dynamicform.js')}}"></script>
	
	@yield('footer')
</body>

<script>
    let scanner = new Instascan.Scanner({video: document.getElementById('preview'), mirror: false});
    scanner.addListener('scan', function(content){
        alert(content);
		const array = content.split("-");
		$("#gedung").val(array[0]);
		$("#ruangan").val(array[1]);
    });

	//Detect user's cameras
	Instascan.Camera.getCameras().then(function (cameras) {
    //     if (cameras.length > 0) {
    //         var selectedCam = cameras[0];
    //         $.each(cameras, (i, c) => {
    //             if (c.name.indexOf('back') != -1) {
    //                 selectedCam = c;
    //                 return false;
    //             }
    //         });

    //         scanner.start(selectedCam);
    //     } else {
    //         console.error('No cameras found.');
    // }
    	//If a camera is detected
    	if (cameras.length > 0) {
        //If the user has a rear/back camera
        if (cameras[1]) {
            //use that by default
            scanner.start(cameras[1]);
        } else {
            //else use front camera
            scanner.start(cameras[0]);
        }
    } else {
        //if no cameras are detected give error
        console.error('No cameras found.');
    }
    }).catch(function (e) {
        console.error(e);
    });
    
    function show_reg_password() {
      var x = document.getElementById("reg_password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    
    function show_conf_password() {
      var x = document.getElementById("conf_password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    
</script>

</html>
