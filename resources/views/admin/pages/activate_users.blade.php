@extends('admin.master')

@section('title', 'Active User Subscription')

@section('content')
	
	@if(Session::has('subscriptions-successful-uploaded'))
		<script type="text/javascript">
			swal("Good job!", "Subscriptions SuccessFully Created", "success");
		</script>
	@endif

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.subscription_side_nav')

				<form class="col-md-10" action="{{ Url('subscription/activate/users') }}" method="POST" enctype="multipart/form-data">
				    <div class="panel panel-white">

				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Create Subscription</h4>
				        </div>
				        <div class="panel-body">
				            <div class="form-horizontal">

				            	@include('admin.includes.sections.display_error')

				                <div class="form-group">
                                    <label class="col-sm-2 control-label">User</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-sm" name="user_id" required>
                                            <option>Select Devotion Category</option>
                                            @foreach($users as $user)
                                            	<option value="{{$user->id}}">{{$user->name}}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>

				                <div class="panel-body pull-right">
                                    <button type="submit" class="btn btn-success btn-lg">Activate User</button>
                                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection