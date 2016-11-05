$(document).ready(function() {
    $(".tablesearch").hide();
    // Search
    function search() {
        var query_value = $('input#searchbox').val();
        if (query_value !== '') {
            $.ajax({
                type: "POST",
                url: "restaurants/search.php",
                data: {
                    query: query_value
                },
                cache: false,
                success: function(html) {
                    $(".tablesearch").html(html);
                }
            });
        }
        return false;
    }

		$('body').on('keyup', 'input#searchbox', function(e) {
        // Set Timeout
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
