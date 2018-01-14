@extends('admin.master')

@section('title', 'Devotions')

@section('content')

	@if(Session::has('devotion-successful-uploaded'))
		<script type="text/javascript">
			swal("Good job!", "Devotion Uploaded", "success");
		</script>
	@endif

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.category_side_nav')
				<div class="col-md-10">
					<div class="panel panel-white">
					<div class="panel-body mailbox-content">
					<table class="table">
						<thead>
							<tr>
								<th colspan="1" class="hidden-xs"></th>
								<th class="text-right" colspan="5">

									<div class="btn-group">

									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $category)
								<tr class="unread" style="cursor: pointer;" onclick="window.location='{{ Url('category/' . $category->id) }}'">
									<td class="hidden-xs">
										{{$category->title}}
									</td>
									<td>
										{{ str_limit($category->description, 78, ' (.....)') }}
									</td>
									<td>
										{{$category->created_at}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					</div>
				</div>
			</div><!-- Row -->
		</div><!-- Main Wrapper -->
	</div><!-- Page Inner -->
@endsection