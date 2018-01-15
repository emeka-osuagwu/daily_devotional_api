<!-- Navbar -->
<div class="navbar">
	<div class="navbar-inner container">
		<div class="sidebar-pusher">
			<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="logo-box">
			<a href="{{ Url('/') }}" class="logo-text"><span>Decree Your Day</span></a>
		</div>
		<div class="search-button">
			<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
		</div>
		<div class="topmenu-outer">
			<div class="top-menu">
		
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
							<span class="user-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}<i class="fa fa-angle-down"></i></span>
							<img class="img-circle avatar" src="{{ Auth::user()->image ? Auth::user()->image : 'https://www.brewish.net/img/placeholders/userPlaceholder.svg' }}" width="40" height="40" alt="">
						</a>
						<ul class="dropdown-menu dropdown-list" role="menu">
							<li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
							<li role="presentation"><a href="{{url('logout')}}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
						</ul>
					</li>
				</ul><!-- Nav -->
			</div><!-- Top Menu -->
		</div>
	</div>
</div>
<!-- Navbar -->

<div class="page-sidebar sidebar horizontal-bar">
	<div class="page-sidebar-inner">
		<ul class="menu accordion-menu">
			<li class="nav-heading"><span>Navigation</span></li>
			<li class="{{ (Url(Request()->path()) == Url('/')) ? 'active' : '' }}"><a href="{{ Url('/') }}"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
			<li class="{{ (Url(Request()->path()) == Url('devotions')) ? 'active' : '' }}"><a href="{{ url('devotions') }}"><span class="fa fa-book"></span><p> Devotions</p></a></li>
			<li class="{{ (Url(Request()->path()) == Url('categories')) ? 'active' : '' }}"><a href="{{ url('categories') }}"><span class="fa fa-book"></span><p> Categories</p></a></li>
			<li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>UI Kits</p><span class="arrow"></span></a>
				<ul class="sub-menu">
					<li><a href="ui-alerts.html">Alerts</a></li>
					<li><a href="ui-buttons.html">Buttons</a></li>
					<li><a href="ui-icons.html">Icons</a></li>
					<li><a href="ui-typography.html">Typography</a></li>
					<li><a href="ui-notifications.html">Notifications</a></li>
					<li><a href="ui-grid.html">Grid</a></li>
					<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
					<li><a href="ui-modals.html">Modals</a></li>
					<li><a href="ui-panels.html">Panels</a></li>
					<li><a href="ui-progress.html">Progress Bars</a></li>
					<li><a href="ui-sliders.html">Sliders</a></li>
					<li><a href="ui-nestable.html">Nestable</a></li>
					<li><a href="ui-tree-view.html">Tree View</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
