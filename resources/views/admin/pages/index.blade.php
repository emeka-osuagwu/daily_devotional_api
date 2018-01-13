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
		</div>
	</div>
@endsection