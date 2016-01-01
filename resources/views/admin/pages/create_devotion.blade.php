@extends('admin.master')

@section('title', 'Login')

@section('content')
	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.devotion_side_nav')

				<form class="col-md-10" action="{{ Url('devotion/create') }}" method="POST">
				    <div class="panel panel-white">
				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Create Devotion</h4>
				        </div>
				        <div class="panel-body">
				            <div class="form-horizontal">

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Title</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="title" class="form-control" id="input-help-block">
				                        <p class="help-block">Example block-level help text here.</p>
				                    </div>
				                </div>
				                
				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Body</label>
				                    <div class="col-sm-10">
				                        <textarea type="text" style="height: 200px" name="body" class="form-control" id="input-help-block"></textarea>
				                        <p class="help-block">Example block-level help text here.</p>
				                    </div>
				                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection