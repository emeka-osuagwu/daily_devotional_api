@extends('admin.master')

@section('title', 'Login')

@section('content')
	<div class="page-inner">
		<div id="main-wrapper" class="container">

			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">{{$users->count()}}</p>
								<span class="info-box-title">Registered Users</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-users"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">{{$devotions->count()}}</p>
								<span class="info-box-title">Devotions</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-feed"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p><span class="counter">{{$categories->count()}}</span></p>
								<span class="info-box-title">Devotion Categories</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-book-open"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">{{$favorites->count()}}</p>
								<span class="info-box-title">Liked Devotions</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-like"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h4 class="panel-title">Recent Users</h4>
							<div class="panel-control">
								<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="inbox-widget slimscroll" style="overflow: hidden; width: auto; height: 100%;">
								<a href="#">
									@foreach($users as $user)
										<div class="inbox-item">
											<div class="inbox-item-img"><img src="{{ $user->image ? $user->image : 'https://www.brewish.net/img/placeholders/userPlaceholder.svg'}}" class="img-circle" alt=""></div>
											<p class="inbox-item-author">{{$user->name}}</p>
											<p class="inbox-item-text">{{$user->email}}</p>
											<p class="inbox-item-date">{{$user->account_type}}</p>
										</div>
									@endforeach
								</a>
							</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 42px; opacity: 0.3; display: none; border-radius: 0px; z-index: 99; right: 0px; height: 298.923px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h4 class="panel-title">Weather</h4>
							<div class="panel-control">
								<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="weather-widget">
								<div class="row">
									<div class="col-md-12">
										<div class="weather-top">
											<div class="weather-current pull-left">
												<i class="wi wi-day-cloudy weather-icon"></i>
												<p><span>83<sup>°F</sup></span></p>
											</div>
											<h2 class="weather-day pull-right">Miami, FL<br><small><b>13th April, 2015</b></small></h2>
										</div>
									</div>
									<div class="col-md-6">
										<ul class="list-unstyled weather-info">
											<li>Wind <span class="pull-right"><b>ESE 16 mph</b></span></li>
											<li>Humidity <span class="pull-right"><b>64%</b></span></li>
											<li>Pressure <span class="pull-right"><b>30.15 in</b></span></li>
											<li>UV Index <span class="pull-right"><b>6</b></span></li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="list-unstyled weather-info">
											<li>Cloud Cover <span class="pull-right"><b>60%</b></span></li>
											<li>Ceiling <span class="pull-right"><b>17800 ft</b></span></li>
											<li>Dew Point <span class="pull-right"><b>70° F</b></span></li>
											<li>Visibility <span class="pull-right"><b>10 mi</b></span></li>
										</ul>
									</div>
									<div class="col-md-12">
										<ul class="list-unstyled weather-days row">
											<li class="col-xs-4 col-sm-2"><span>12:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
											<li class="col-xs-4 col-sm-2"><span>13:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
											<li class="col-xs-4 col-sm-2"><span>14:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
											<li class="col-xs-4 col-sm-2"><span>15:00</span><i class="wi wi-day-cloudy"></i><span>83<sup>°F</sup></span></li>
											<li class="col-xs-4 col-sm-2"><span>16:00</span><i class="wi wi-day-cloudy"></i><span>82<sup>°F</sup></span></li>
											<li class="col-xs-4 col-sm-2"><span>17:00</span><i class="wi wi-day-sunny-overcast"></i><span>82<sup>°F</sup></span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="panel twitter-box">
						<div class="panel-body">
							<div class="live-tile flip ha" data-mode="flip" data-speed="750" data-delay="3000">
								<span class="tile-title pull-right">New Tweets</span>
								<i class="fa fa-twitter"></i>
								<div class="flip-front ha" style="transform: rotateX(180deg); transition: all 750ms ease 0s;"><h2 class="no-m">It’s kind of fun to do the impossible...</h2><span class="tile-date">10 April, 2015</span></div>
								<div class="flip-back ha" style="transform: rotateX(360deg); transition: all 750ms ease 0s;"><h2 class="no-m">Sometimes by losing a battle you find a new way to win the war...</h2><span class="tile-date">6 April, 2015</span></div>
							</div>
						</div>
					</div>
					<div class="panel facebook-box">
						<div class="panel-body">
							<div class="live-tile carousel ha" data-mode="carousel" data-direction="horizontal" data-speed="750" data-delay="4500">
								<span class="tile-title pull-right">Facebook Feed</span>
								<i class="fa fa-facebook"></i>
								<div class="slide ha" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(-100%, 0%) translateZ(0px);"><h2 class="no-m">If you're going through hell, keep going...</h2><span class="tile-date">23 March, 2015</span></div>
								<div class="slide ha active" style="transform: translate(0%, 0%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;"><h2 class="no-m">To improve is to change; to be perfect is to change often...</h2><span class="tile-date">15 March, 2015</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h4 class="panel-title">Project Stats</h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive project-stats">  
							   <table class="table">
								   <thead>
									   <tr>
										   <th>#</th>
										   <th>Title</th>
										   <th>Description</th>
										   <th>Image</th>
										   <th>Status</th>
									   </tr>
								   </thead>
								   <tbody>
									<th hidden scope="row">{{$count = 1}}</th>
								   	@foreach($devotions->take(10) as $devotion)
									   <tr>
										   <th scope="row">{{$count++}}</th>
										   <td>{{$devotion->title}}</td>
										   <td>{{$devotion->description}}</td>
										   <td>
										   		<img src="{{$devotion->cover_image}}">
										   </td>
										   <td><span class="label label-info">Pending</span></td>
									   </tr>
									  @endforeach
								   </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection