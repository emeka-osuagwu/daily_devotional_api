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
								<!-- <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a> -->
							</div>
						</div>
						<div class="panel-body">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="inbox-widget slimscroll" style="overflow: hidden; width: auto; height: 100%;">
								<a href="#">
									@foreach($users->take(5) as $user)
										<div class="inbox-item">
											<div class="inbox-item-img"><img src="{{ $user->image ? $user->image : 'https://www.brewish.net/img/placeholders/userPlaceholder.svg'}}" class="img-circle" alt=""></div>
											<p class="inbox-item-author">{{$user->name}}</p>
											<p class="inbox-item-text">{{$user->email}}</p>


											<p class="inbox-item-date">
												@if($user->platform_name == 'gmail')
													<span class="label label-danger">Gmail</span>
												@endif
												
												@if($user->platform_name == 'facebook')
													<span class="label label-info">Facebook</span>
												@endif

												@if($user->platform_name == 'twitter')
													<span class="label label-danger">Twitter</span>
												@endif
											</p>
										</div>
									@endforeach
								</a>
							</div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 42px; opacity: 0.3; display: none; border-radius: 0px; z-index: 99; right: 0px; height: 298.923px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div>
						</div>
					</div>
				</div>

				@if($devotions->count())
				<div class="col-lg-8 col-md-6">
					<div class="panel twitter-box" style="background-image: url('{{ $today_devotion->cover_image ? $today_devotion->cover_image : 'http://ak4.picdn.net/shutterstock/videos/11992334/thumb/1.jpg?i10c=img.resize(height:160)' }}');">
						<div class="panel-body">
							<div style="cursor: pointer;" onclick="window.location='{{ Url('devotion/' . $today_devotion->id) }}'" class="live-tile flip ha" data-mode="flip" data-speed="750" data-delay="3000">
								<span class="tile-title pull-right">Today's Devotion</span>
								<i class="fa fa-book"></i>
								<div class="flip-back ha" style="transform: rotateX(360deg); transition: all 750ms ease 0s;">
									<span class="tile-date">{{$today_devotion->created_at}}</span>
									<br>
									<h2 class="no-m">{{$today_devotion->title}}</h2>
		
									<h5 style="margin-top: 10px;" class="no-m">{{$today_devotion->description}}</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="panel twitter-box" style="background-image: url('{{ $next_day_devotion->cover_image ? $next_day_devotion->cover_image : 'http://ak4.picdn.net/shutterstock/videos/11992334/thumb/1.jpg?i10c=img.resize(height:160)' }}');">
						<div class="panel-body">
							<div style="cursor: pointer;" onclick="window.location='{{ Url('devotion/' . $next_day_devotion->id) }}'" class="live-tile flip ha" data-mode="flip" data-speed="750" data-delay="3000">
								<span class="tile-title pull-right">Tomorrow's Devotion</span>
								<i class="fa fa-book"></i>
								<div class="flip-back ha" style="transform: rotateX(360deg); transition: all 750ms ease 0s;">
									<span class="tile-date">{{$next_day_devotion->created_at}}</span>
									<br>
									<h2 class="no-m">{{$next_day_devotion->title}}</h2>
		
									<h5 style="margin-top: 10px;" class="no-m">{{$next_day_devotion->description}}</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h4 class="panel-title">Recent Devotions</h4>
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
										   <tr style="cursor: pointer;" onclick="window.location='{{ Url('devotion/' . $devotion->id) }}'">
											   <th scope="row">{{$count++}}</th>
											   <td>{{$devotion->title}}</td>
											   <td>{{$devotion->description}}</td>
											   <td>
											   		<img src="{{$devotion->cover_image}}">
											   </td>
											   <td>
											   		@if($devotion->status == 'active')
														<span class="label label-info">Active</span>
											   		@endif
											   		@if($devotion->status == 'draft')
														<span class="label label-danger">Draft</span>
											   		@endif
											   </td>
										   </tr>
									  	@endforeach
								   </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>

		</div>
	</div>
@endsection