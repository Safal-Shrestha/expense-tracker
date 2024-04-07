$(document).ready(function(){
    window.loadOverlayContent = function(id) {
        // Make AJAX call to load the PHP page
        $.ajax({
            url: '../expense/edit.php',
            type: 'GET',
            data: {id: id},
            success: function(response){
                $('#overlayContent').html(response);
                $('#overlay').fadeIn();
            }
        });
    }

    // Close the overlay when clicking outside of it
    $(document).on('click', function(e){
        if($(e.target).closest('#overlayContent').length === 0 && $(e.target).attr('onclick') !== 'loadOverlayContent()'){
            $('#overlay').fadeOut();
        }
    });
});