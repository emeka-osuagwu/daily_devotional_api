@if ($errors->any())
	@foreach ($errors->all() as $error)
    	<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            Oh snap! {{$error}}.
        </div>
	@endforeach
@endif