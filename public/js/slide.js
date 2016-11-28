
$(document).ready(function(){
    $(".goals_btn").click(function(){
        $(this).closest('tr').next('.goals').toggle(200);
    });
});

 