@extends('admin.master')

@section('title', 'Login')

@section('content')

	@if(Session::has('active-subscription-successful-changed'))
		<script type="text/javascript">
			swal("Opps!", "Active subscription changed", "success");
		</script>
	@endif

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.subscription_side_nav')

				<form class="col-md-10" action="{{ Url('subscription/activate') }}" method="POST" enctype="multipart/form-data">
				    <div class="panel panel-white">

				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Update Active Subscription</h4>
				        </div>
				        <div class="panel-body">
				            <div class="form-horizontal">

				            	@include('admin.includes.sections.display_error')

				                <div class="form-group">
                                    <label class="col-sm-2 control-label">Select Subscription</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-sm" name="subscription_id" required>
                                            <option value="">Select</option>
                                            @foreach($subscriptions as $subscription)
                                            	<option value="{{$subscription->id}}">{{$subscription->title}}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>

				                <div class="panel-body pull-right">
                                    <button type="submit" class="btn btn-success btn-lg">Activate</button>
                                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection