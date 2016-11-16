$.getScript('js/shared-trigger.js', function() {
    $(function() {
        $(".tablesearch").hide();
        // Search
        function search() {
            $.ajax({
                type: "POST",
                url: "restaurants/search.php",
                data: {
                    query: $('input#searchbox').val(),
                    filter1: $('#filter1').serialize(),
                    filter2: $('#filter2').serialize()
                },
                cache: false,
                success: function(html) {
                    $(".tablesearch").html(html);
                }
            });
            return false;
        }

        $('#filter1').on('change', function() {
            search();
            useSearchTable($(this).serialize() != '');
        });

        $('#filter2').on('change', function() {
            search();
            useSearchTable($(this).serialize() != '');
        });

        $('body').on('keyup', 'input#searchbox', function(e) {
            clearTimeout($.data(this, 'timer'));
            var search_string = $(this).val();
            useSearchTable(search_string != '');
        });

    });
});
