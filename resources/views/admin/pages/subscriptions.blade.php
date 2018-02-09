@extends('admin.master')

@section('title', 'Subscriptions')

@section('content')

	@if(Session::has('devotion-successful-uploaded'))
		<script type="text/javascript">
			swal("Good job!", "Devotion Uploaded", "success");
		</script>
	@endif

	@if(Session::has('cant-delete-active-subscription'))
		<script type="text/javascript">
			swal("Opps!", "Can't delete active subscription", "error");
		</script>
	@endif

	@if(Session::has('delete-subscription-successful'))
		<script type="text/javascript">
			swal("Good job!", "Subscription Deleted", "success");
		</script>
	@endif

	@if(Session::has('category-successful-deleted'))
		<script type="text/javascript">
			swal("Good job!", "Category Deleted", "success");
		</script>
	@endif

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.subscription_side_nav')
				<div class="col-md-10">
					<div class="panel panel-white">
					<div class="panel-body mailbox-content">
					<table class="table">
						<thead>
							<tr>
								<th colspan="1" class="hidden-xs">Title</th>
								<th colspan="1" class="hidden-xs">Price</th>
								<th colspan="1" class="hidden-xs">State Date</th>
								<th colspan="1" class="hidden-xs">End Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach($subscriptions as $subscription)
								<tr class="unread" style="cursor: pointer;">
									<td class="hidden-xs">{{$subscription->title}}</td>
									<td>{{$subscription->price}}</td>
									<td class="hidden-xs">{{$subscription->start_date}}</td>
									<td class="hidden-xs">{{$subscription->end_date}}</td>
									<td class="hidden-xs"><Button onclick="window.location='{{ Url('subscription/' . $subscription->id . '/delete') }}'" class="btn btn-success btn-lg"><span class="fa fa-trash"></Button></td>
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