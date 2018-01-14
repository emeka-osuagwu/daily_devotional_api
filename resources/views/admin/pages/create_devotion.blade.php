@extends('admin.master')

@section('title', 'Login')

@section('content')
	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.devotion_side_nav')

				<form class="col-md-10" action="{{ Url('devotion/create') }}" method="POST" enctype="multipart/form-data">
				    <div class="panel panel-white">

				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Create Devotion</h4>
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
                                    <label class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-sm" name="category_id" required>
                                            <option>Select Devotion Category</option>
                                            @foreach($categories as $category)
                                            	<option value="{{$category->id}}">{{$category->title}}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Bible verse</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="bible_verse" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Bible Verse</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Description</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="description" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Description</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>
				                
				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Body</label>
				                    <div class="col-sm-10">
				                        <textarea type="text" style="height: 200px" name="body" class="form-control" id="input-help-block" required></textarea>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Body</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Confession</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="confession" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Confession</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Prayer</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="prayer" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Prayer</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Further Reading</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="further_reading" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Further Reading</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Cover Image</label>
				                    <div class="col-sm-10">
				                        <input type="file" name="image" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter an 
				                        	<span style="font-weight: bold;">Image</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="panel-body pull-right">
                                    <button type="submit" class="btn btn-success btn-lg">Save</button>
                                    <button type="button" class="btn btn-primary btn-lg">Draft</button>
                                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection