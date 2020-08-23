jQuery(function(){
	jQuery('#create-list-table').DataTable();
	jQuery('#create-list-table-shelf').DataTable();
	jQuery("#frm-id-book-shelf").validate({
		submitHandler: function(){
			var postdata = jQuery("#frm-id-book-shelf").serialize();
			postdata += "&action=admin_ajax_request&param=create_book_shelf";
			jQuery.post(ajaxurl,postdata,function(response){
				var data = jQuery.parseJSON(response);

				if(data.status == 1){

					alert(data.message);

					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			})
		}
});

jQuery(document).on("click","#btn-first-ajax",function(){
	var postdata = "action=admin_ajax_request&param=simple_first_ajax";
	jQuery.post(ajaxurl,postdata ,function(response){
		console.log(response)
	})
})

});


