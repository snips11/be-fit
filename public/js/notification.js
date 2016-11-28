$(document).on('click', '#notification', function() {

    var wrap = $(this).closest('.notifications_drop');
  wrap.find('form').each(function() {

      var id = $(this).prop('id');
      var arr = jQuery.makeArray( "#"+id );
      var url = $(this).attr('action');
      var type = $(this).attr('method');
      var i = $('#'+id); // Or just $(this)
      var data = i.serialize();

// setup on submit 
      i.submit(function(event) {
	event.preventDefault();
	var formElem = $(event.currentTarget);
          
console.log(data);
          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

          $.ajax({
              type        : type, 
              url         : url, 
              data        : data,
              dataType    : 'json'
              
            
            })
              .done(function(response){ 
              console.log("Done!");
            	$( "span.badge" ).replaceWith( "<span class='badge'>0</span>" );
               })
              .fail(function(jqXHR, textStatus, errorThrown){ 
    console.log("Fail!", jqXHR, textStatus, errorThrown); 
 });     
	});
	i.submit();
  });

});