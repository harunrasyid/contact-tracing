<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
							@if(auth()->user()->role == 'mahasiswa')
								<li><a href="/mahasiswa/dashboard" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
								<li><a href="/mahasiswa/{{auth()->user()->id}}/profil" class=""><i class="fas fa-user-circle"></i> <span>Profil & Data Pribadi</span></a></li>			
							@endif
							@if(auth()->user()->role == 'admin')
								<li><a href="/admin/dashboard" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
							@endif
							@if(auth()->user()->role == 'pemantau')
								<li><a href="/pemantau/dashboard" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
							@endif
					</ul>
				</nav>
			</div>
		</div>