$(document).ready(function() {
    $(".tablesearch").hide();
    // Search
    function search() {
        //if (query_value !== '') {
            $.ajax({
                type: "POST",
                url: "restaurants/search.php",
                data: {
                    query: $('input#searchbox').val(),
                    filter1: $("#filter1").serialize(),
                    filter2: $("#filter2").serialize()
                },
                cache: false,
                success: function(html) {
                    $(".tablesearch").html(html);
                }
            });
        //}
        return false;
    }

    $('#filter1').on('change', function() {
        search();
    });

    $('#filter2').on('change', function() {
        search();
    });

    $('body').on('keyup', 'input#searchbox', function(e) {
        clearTimeout($.data(this, 'timer'));
        // Set Search String
        var search_string = $(this).val();
        // Do Search
        if (search_string == '') {
            $(".tablesearch").fadeOut(300);
            $(".populated").fadeIn(300);
        } else {
            $(".tablesearch").fadeIn(300);
            $(".populated").fadeOut(300);
            $(this).data('timer', setTimeout(search, 100));
        };
    });

});
