@extends('admin.master')

@section('title', 'Create Subscription')

@section('content')
	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.subscription_side_nav')

				<form class="col-md-10" action="{{ Url('subscription/create') }}" method="POST" enctype="multipart/form-data">
				    <div class="panel panel-white">

				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Create Subscription</h4>
				        </div>
				        <div class="panel-body">
				            <div class="form-horizontal">

				            	@include('admin.includes.sections.display_error')

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Title</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="title" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Title</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Amount</label>
				                    <div class="col-sm-10">
				                        <input type="number" name="title" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter an
				                        	<span style="font-weight: bold;">Amount</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">State Date</label>
				                    <div class="col-sm-10">
				                        <input type="date" name="start_date" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Start Date</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>
				 
				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">End Date</label>
				                    <div class="col-sm-10">
				                        <input type="date" name="end_date" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">End Date</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>
				

				                <div class="panel-body pull-right">
                                    <button type="submit" class="btn btn-success btn-lg">Save</button>
                                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection