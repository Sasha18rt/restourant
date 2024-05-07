<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	

	<!-- Import lib -->

	<link rel="stylesheet" type="text/css" href="{{url('CSS/admin.css')}}">

	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e3a49d370f.js" crossorigin="anonymous"></script>
	
    <!-- End import lib -->

	
</head>
<body class="overlay-scrollbar bg ">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				<div>
					<h5>NAME</h5>
				</div>
			</li>
		</ul>
		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			
		</form>
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode">
				<a class="nav-link" href="#" onclick="switchTheme()">
					<i class="fas fa-moon dark-icon"></i>
					<i class="fas fa-sun light-icon"></i>
				</a>
			</li>
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					<img src="assets/taut.png" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li class="dropdown-menu-item">
							<a class="dropdown-menu-link" href="{{ route('profile.show') }}">
								<div>
									<i class="fas fa-user-tie"></i>
								</div>
								<span>{{ Auth::user()->name }}</span> <!-- Display user's name -->
							</a>
						</li>
						<li class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>
									Logout
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="/users" class="sidebar-nav-link  @yield('users')">
					<div>
						<i class="fa-solid fa-users"></i>
					</div>
					<span>Users</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="/menu" class="sidebar-nav-link @yield('menu') ">
					<div>
						<i class="fa-solid fa-utensils"></i>
					</div>
					<span>Menu</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="/reviews" class="sidebar-nav-link @yield('reviews')">
					<div>
						<i class="fa-solid fa-comments"></i>
					</div>
					<span>Reviews</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="/areservation" class="sidebar-nav-link @yield('reservation')">
					<div>
                    <i class="fa-solid fa-user-pen"></i>
					</div>
					<span>Reservation</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- main content -->
    <div class="wrapper">
	@yield('content')

  
    </div>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>
</html>
