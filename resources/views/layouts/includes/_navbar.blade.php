<nav class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-menu" style="padding-left: 25px"></i></button>
			</div>
			<div class="brand">
				<a href="/mahasiswa/dashboard"><img src="{{asset('/img/logo_itb_1024.png')}}" alt="Logo ITB" class="img-responsive logo" width="25" height="25"></a>
			</div>
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								@if(count(auth()->user()->unreadNotifications) > 0)
									<span class="badge bg-danger">{{count(auth()->user()->unreadNotifications)}}</span>
								@endif
							</a>
							<ul class="dropdown-menu notifications">
								@php
									$notifications = auth()->user()->unreadNotifications
								@endphp

								@foreach($notifications as $notification)
									<li><a href="/notifikasi" class="notification-item"><span class="dot bg-danger"></span>[{{$notification->created_at}}] {{$notification->data['title']}}</a></li>
								@endforeach

								@if(count($notifications) == 0)
									<li><a class="more">Tidak Ada Notifikasi Terbaru</li>
								@endif

								<li><a href="/notifikasi" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							@if(auth()->user()->role == 'mahasiswa')
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle fa-1x"></i> <span>{{auth()->user()->mahasiswa->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							@endif

							@if(auth()->user()->role == 'admin')
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle fa-1x"></i> <span>Admin : {{auth()->user()->admin->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							@endif

							@if(auth()->user()->role == 'pemantau')
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle fa-1x"></i> <span>Tim Pemantau : {{auth()->user()->pemantau->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							@endif

							<ul class="dropdown-menu">
							    @if(auth()->user()->role == 'mahasiswa')
							        <li><a href="/mahasiswa/{{auth()->user()->id}}/profil"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
								    <li><a href="/mahasiswa/{{auth()->user()->id}}/editakun"><i class="lnr lnr-cog"></i> <span>Pengaturan Akun</span></a></li>
							    @endif
							    
							    @if(auth()->user()->role == 'pemantau')
								    <li><a href="/pemantau/{{auth()->user()->id}}/editakun"><i class="lnr lnr-cog"></i> <span>Pengaturan Akun</span></a></li>
							    @endif
							    
							    @if(auth()->user()->role == 'admin')
								    <li><a href="/admin/{{auth()->user()->id}}/editakun"><i class="lnr lnr-cog"></i> <span>Pengaturan Akun</span></a></li>
							    @endif

								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>