function deleteContentAlert(id, url) 
{
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this information",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => 
	{
		if (willDelete) {
			swal("Poof! Your devotion has been deleted!", {
			icon: "success",
		});

		window.location = url
	} 
	else 
	{
		swal("Your devotion information is safe!");
	}
	});
}


function emeka() {
	$('.summernote').innerHTML()
	console.log($('.summernote').innerHTML())
}


$('input.number').keyup(function(event) {
    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;
    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      ;
    });
});
