@extends('admin.master')

@section('title', $devotion->title)

@section('content')
	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.devotion_side_nav')

				<form class="col-md-10" action="{{ Url('devotion/update') }}" method="POST" enctype="multipart/form-data">
				    
				    <input type="text" value="{{$devotion->id}}" name="devotion_id" hidden>

				    <div class="panel panel-white">

				        <div class="panel-heading clearfix">
				            <h4 class="panel-title">Edit Devotion</h4>
				        </div>
				        <div class="panel-body">
				            <div class="form-horizontal">

				            	@include('admin.includes.sections.display_error')

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Title</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="title" value="{{$devotion->title}}" class="form-control" id="input-help-block" required>
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
                                            <option value="{{$devotion->category->id}}">{{$devotion->category->title}}</option>
                                            @foreach($categories->except($devotion->category->id) as $category)
                                            	<option value="{{$category->id}}">{{$category->title}}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>

				                <div class="form-group">
	                                <label class="col-sm-2 control-label">Devotion State</label>
	                                <div class="col-sm-10">
	                                    <select class="form-control m-b-sm" name="status" required>
	                                        <option value="">Select Status</option>
	                                        <option value="active">Active</option>
	                                        <option value="draft">Save as Draft</option>
	                                    </select>
	                                </div>
	                            </div>


				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Bible verse</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="bible_verse" value="{{$devotion->bible_verse}}" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Bible Verse</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Description</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="description" value="{{$devotion->description}}" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Description</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>
				                
				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Body</label>
				                    <div class="col-sm-10">
				                        <textarea type="text" style="height: 200px" name="body" class="form-control" id="input-help-block" required>{{$devotion->body}}</textarea>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Body</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Confession</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="confession" value="{{$devotion->confession}}" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Confession</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Prayer</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="prayer" value={{$devotion->prayer}} class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Prayer</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Further Reading</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="further_reading" value="{{$devotion->further_reading}}" class="form-control" id="input-help-block" required>
				                        <p class="help-block">Enter a 
				                        	<span style="font-weight: bold;">Further Reading</span> for this post 
				                        	<span style="color: red">(Required)</span>.
				                        </p>
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label for="input-help-block" class="col-sm-2 control-label">Cover Image</label>
				                    <div class="col-sm-10">
                    		            <div class="message-attachments">
                    		                <p><i class="fa fa-paperclip m-r-xs"></i>Image - <a href="{{ $devotion->cover_image }}" target="_blank">View</a></p>
                    		                <div class="message-attachment">
                    	                        <div class="attachment-content">
                    	                        	@if($devotion->cover_image == '')
                    	                        		No image for this post
                    	                        	@endif
                    	                            <img src="{{ $devotion->cover_image }}" alt="">
                    	                        </div>
                    		                </div>
                    		            </div>
				                        <input type="file" name="cover_image" class="form-control" id="input-help-block">
				                        <p class="help-block">Enter an 
				                        	<span style="font-weight: bold;">Image</span> for this post 
				                        </p>
				                    </div>
				                </div>

				                <div class="panel-body pull-right">
                                    <button type="submit" class="btn btn-success btn-lg">Update</button>
                                </div>

				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
@endsection