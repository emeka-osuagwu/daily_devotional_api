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
	</div>
</div>
<!-- Navbar -->

<div class="page-sidebar sidebar horizontal-bar">
	<div class="page-sidebar-inner">
		<ul class="menu accordion-menu">
			<li class="nav-heading"><span>Navigation</span></li>
			<li class="{{ (Url(Request()->path()) == Url('/')) ? 'active' : '' }}"><a href="{{ Url('/') }}"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
			<li class="{{ (Url(Request()->path()) == Url('devotions')) ? 'active' : '' }}"><a href="{{ url('devotions') }}"><span class="menu-icon icon-user"></span><p>Devotions</p></a></li>
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
