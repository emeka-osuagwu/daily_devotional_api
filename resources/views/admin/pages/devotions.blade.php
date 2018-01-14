@extends('admin.master')

@section('title', 'Login')

@section('content')

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.devotion_side_nav')
				<div class="col-md-10">
					<div class="panel panel-white">
					<div class="panel-body mailbox-content">
					<table class="table">
						<thead>
							<tr>
								<th colspan="1" class="hidden-xs"></th>
								<th class="text-right" colspan="5">
									<span class="text-muted m-r-sm">Showing {{$devotions->lastItem()}} of {{$devotions->total()}} </span>

									<div class="btn-group">
										<a href="{{ $devotions->previousPageUrl() }}" class="btn btn-default"><i class="fa fa-angle-left"></i></a>
										<a href="{{ $devotions->nextPageUrl() }}" class="btn btn-default"><i class="fa fa-angle-right"></i></a>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
						@include('admin.includes.sections.display_error')
						</tbody>
					</table>
					</div>
					</div>
				</div>
			</div><!-- Row -->
		</div><!-- Main Wrapper -->
	</div><!-- Page Inner -->
@endsection