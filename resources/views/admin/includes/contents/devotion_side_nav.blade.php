<div class="col-md-12">
	<div class="row mailbox-header">
		<div class="col-md-2">
			<a href="{{Url('devotion/create')}}" class="btn btn-success btn-block">Compose</a>
		</div>
		<div class="col-md-2 pull-right">
			<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target=".upload-dvotion-model">Upload</button>
		</div>
	</div>
</div>

<div class="col-md-2">
	<ul class="list-unstyled mailbox-nav">
		<li class="active"><a href="{{Url('/devotions')}}"><i class="fa fa-inbox"></i>Devotions</a></li>
		<!-- <li><a href="#"><i class="fa fa-sign-out"></i>Publish Devotion</a></li> -->
<!-- 		<li><a href="#"><i class="fa fa-sign-out"></i>Active</a></li>
		<li><a href="#"><i class="fa fa-sign-out"></i>Draft</a></li> -->
	</ul>
</div>

<div style="margin-top: 40px;" class="modal fade upload-dvotion-model" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <form action="{{Url('devotion/upload')}}" method="POST" class="modal-dialog modal-sm" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Upload Devotions</h4>
            </div>
            <div class="modal-body">
                <div class="upload-btn-wrapper">
                  <button style="padding: 22px; text-align: center;  margin-left: 64px;" class="btn">Upload a file</button>
                  <input type="file" name="file" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
</div>