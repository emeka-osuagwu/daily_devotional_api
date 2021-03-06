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
								<form class="col-md-10" action="{{ Url('category/create') }}" method="POST" enctype="multipart/form-data">
								    <div class="panel panel-white">

								        <div class="panel-heading clearfix">
								            <h4 class="panel-title">Create Category</h4>
								        </div>
								        <div class="panel-body">
								            <div class="form-horizontal">

								            	@include('admin.includes.sections.display_error')

								                <div class="form-group">
								                    <label for="input-help-block" class="col-sm-2 control-label">Title</label>
								                    <div class="col-sm-10">
								                        <input type="text" name="title" class="form-control" value="{{old('title')}}" id="input-help-block" required>
								                        <p class="help-block">Enter a 
								                        	<span style="font-weight: bold;">Title</span> for this post 
								                        	<span style="color: red">(Required)</span>.
								                        </p>
								                    </div>
								                </div>
								                
								                <div class="form-group">
								                    <label for="input-help-block" class="col-sm-2 control-label">Description</label>
								                    <div class="col-sm-10">
								                        <textarea type="text" style="height: 200px" name="description" class="form-control" id="input-help-block" required>{{old('description')}}</textarea>
								                        <p class="help-block">Enter a 
								                        	<span style="font-weight: bold;">Description</span> for this post 
								                        	<span style="color: red">(Required)</span>.
								                        </p>
								                    </div>
								                </div>

				
								                <div class="form-group">
								                    <label for="input-help-block" class="col-sm-2 control-label">Cover Image</label>
								                    <div class="col-sm-10">
								                        <input type="file" name="cover_image" class="form-control" id="input-help-block" required>
								                        <p class="help-block">Enter an 
								                        	<span style="font-weight: bold;">Image</span> for this post 
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