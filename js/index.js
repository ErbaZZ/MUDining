$(function() {
    var modal = document.getElementById('recommend');
    $('#bottombar-wrapper').mousewheel(function(event, delta) {
        this.scrollLeft -= (delta * 80);
        this.scrollRight -= (delta * 80);
        event.preventDefault();
    });

    function bringback() {
        $('.random_eat_button').animate({
            opacity: 1
        });
    }

    $('.random_eat_button').click(function() {
        $(this).animate({
            opacity: 0
        });
        modal.style.display = "block";
    });

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        bringback();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            bringback();
        }
    }


});
