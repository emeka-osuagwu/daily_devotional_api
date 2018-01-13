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