$(document).on('click', '#button', function() {

  var wrap = $(this).closest('div.form_wrap');

  var da = wrap.find('form').first().prop('id');
  var d = $('#'+da);
  var dat = d.serialize();

  d.submit(function(event) {
                                            event.preventDefault();
                                            var formElem = $(event.currentTarget);
                                                
                                        console.log(dat);
                                                $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                                $.ajax({
                                                    type        : 'post', 
                                                    url         : '/workout_notifications', 
                                                    data        : dat,
                                                    dataType    : 'json'
                                                    
                                                    
                                                    })
                                                    .done(function(response){ 
                                                                                console.log("Done2!");
                                                                                
                                                    })
                                                    .fail(function(jqXHR, textStatus, errorThrown){ 
                                            console.log("Fail2!", jqXHR, textStatus, errorThrown); 
                                        });     
                                            });

  wrap.find('form').each(function() {

      var id = $(this).prop('id');
      var arr = jQuery.makeArray( "#"+id );
      var url = $(this).attr('action');
      var type = $(this).attr('method');
      var i = $('#'+id); // Or just $(this)
      var data = i.serialize();
      ;
      


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
                                        console.log(d);
                                        $('#shared_success').show();
                                        setTimeout(location.reload.bind(location), 1200);
                                                                               
                                                    })
                                                    .fail(function(jqXHR, textStatus, errorThrown){ 
                                            console.log("Fail!", jqXHR, textStatus, errorThrown); 
                                        });     
	});
	i.submit();
  
    
  });
  
    });