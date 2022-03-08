$('#qu').click
(
    function()
    {    
        var update;
        var text = $('#qu').text();
        var id = $(this).data("id");  
        // alert();

        if (text == 'like')
        {
            $('#qu').css('background', 'rgb(255, 0, 0)');
            $('#qu').text('no like');
            update = 1;          
        }
        else
        {
            $('#qu').css('background', 'rgb(186, 69, 240)');
            $('#qu').text('like');
            update = -1;
        }

        $.post('../functions/like.php', {id: id, update: update}, function(data)
        {
            // alert(data);   
            $('#count').text(data); 
        // window.location.reload();
        });
    }
);
// --------------------------------------------------------------
// $('#sub').click
// (
//     function(){
//         var comment = $(this).data("comment");
//     } 
// )