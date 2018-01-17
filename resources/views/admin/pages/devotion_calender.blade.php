@extends('admin.master')

@section('title', "Devotion")

@section('content')
	
	@if(Session::has('devotion-successful-created'))
		<script type="text/javascript">
			swal("Good job!", "Devotion Created", "success");
		</script>
	@endif

	@if(Session::has('devotion-successful-updated'))
		<script type="text/javascript">
			swal("Good job!", "Devotion Updated", "success");
		</script>
	@endif

	<div class="page-inner">
		<div id="main-wrapper" class="container">
			<div class="row m-t-md">
				@include('admin.includes.contents.devotion_side_nav')
				<div class="col-md-10">
				    <div class="panel panel-white">
				        <div class="panel-body mailbox-content">

							<div class="message-header" style="border-bottom-color: transparent;">
    							<div class="form-group" style="padding-left: 0">
    								<form action="{{ Url('devotion/calender_filter') }}">
    	                                <label class="col-sm-12 control-label" style="padding-left: 0px;">Date Picker</label>
    	                                <div class="col-sm-5" style="padding-left: 0px;">
    	                                    <input type="text" placeholder="Enter Date" name="date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
    	                                </div>
    	                                <div class="col-sm-2">
    	                                    <button class="btn btn-success">Search</button>
    	                                </div>
    								</form>
                                </div>
                            </div>


                            @if($search)
	                            @if(!$devotion->count())
	                            	<div style="text-align: center; margin-top: 50px;">
	                            		<p class="fa fa-user" style="font-size: 200px"></p>
	                            		<p class="" style="font-size: 20px;">Devotion not found for that date</p>
	                            	</div>
	                            @endif
                            @endif

				            @if($devotion->count())
								<div class="message-header">
								    <h3><span>Title:</span> {{ $devotion->first()->title }}
								    	@if($devotion->first()->status == 'active')
								    		<span style="margin-left: 5px;" class="badge badge-success pull-right"> Active Post</span>
								    	@endif
								    	@if($devotion->first()->status == 'draft')
								    		<span style="margin-left: 5px;" class="badge badge-danger pull-right"> Draft Post</span>
								    	@endif
								    	<span style="margin-left: 5px;" class="badge badge-info pull-right">{{$devotion->first()->category->title}}</span>
								    </h3>
								    <p class="message-date">{{$devotion->first()->created_at}}</p>
								</div>
								<div class="message-content">
								    
								    <div style="margin-bottom: 30px">
								        <p>Bible verse</p>
										<p>{{$devotion->first()->bible_verse}}</p>
								    </div>

								    <div style="margin-bottom: 30px">
								        <p>Description</p>
										<p>{{$devotion->first()->description}}</p>
								    </div>

								    <div style="margin-bottom: 30px">
								        <p>Body</p>
										<p>{{$devotion->first()->body}}</p>
								    </div>

								    <div style="margin-bottom: 30px">
								        <p>Confession</p>
										<p>{{$devotion->first()->confession}}</p>
								    </div>

								    <div style="margin-bottom: 30px">
								        <p>Prayer</p>
										<p>{{$devotion->first()->prayer}}</p>
								    </div>
								</div>
								<div class="message-attachments">
								    <p><i class="fa fa-paperclip m-r-xs"></i>Image - <a href="{{ $devotion->first()->cover_image }}" target="_blank">View</a></p>
								    <div class="message-attachment">
								        <div class="attachment-content">
								        	@if($devotion->first()->cover_image == '')
								        		No image for this post
								        	@endif
								            <img src="{{ $devotion->first()->cover_image }}" alt="">
								        </div>
								    </div>
								</div>
								<div class="message-options pull-right">
									<a href="{{ Url('devotion/' . $devotion->first()->id . '/edit') }}" class="btn btn-default"><i class="fa fa-pencil m-r-xs"></i>Edit</a> 
								    <a class="btn btn-danger" onclick="deleteContentAlert({{$devotion->first()->id}}, '{{ Url('devotion/' . $devotion->first()->id . '/delete') }}')"><i class="fa fa-trash m-r-xs"></i>Delete</a> 
								</div>
							@endif

				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection