@extends('admin.master')

@section('title', $devotion->title)

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
				            <div class="message-header">
				                <h3><span>Title:</span> {{ $devotion->title }}
				                	@if($devotion->status == 'active')
				                		<span style="margin-left: 5px;" class="badge badge-success pull-right"> Active Post</span>
				                	@endif
				                	@if($devotion->status == 'draft')
				                		<span style="margin-left: 5px;" class="badge badge-danger pull-right"> Draft Post</span>
				                	@endif
				                </h3>
				                <p class="message-date">{{$devotion->created_at}}</p>
				                
				            </div>
				            <div class="message-content">
				                
				                <div style="margin-bottom: 30px">
					                <p>Bible verse</p>
									<p>{{$devotion->bible_verse}}</p>
				                </div>

				                <div style="margin-bottom: 30px">
					                <p>Description</p>
									<p>{{$devotion->description}}</p>
				                </div>

				                <div style="margin-bottom: 30px">
					                <p>Body</p>
									<p>{{$devotion->body}}</p>
				                </div>

				                <div style="margin-bottom: 30px">
					                <p>Confession</p>
									<p>{{$devotion->confession}}</p>
				                </div>

				                <div style="margin-bottom: 30px">
					                <p>Prayer</p>
									<p>{{$devotion->prayer}}</p>
				                </div>

				            </div>
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
				            <div class="message-options pull-right">
				            	<a href="{{ Url('devotion/' . $devotion->id . '/edit') }}" class="btn btn-default"><i class="fa fa-pencil m-r-xs"></i>Edit</a> 
				                <a class="btn btn-danger" onclick="deleteContentAlert({{$devotion->id}}, '{{ Url('devotion/' . $devotion->id . '/delete') }}')"><i class="fa fa-trash m-r-xs"></i>Delete</a> 
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection