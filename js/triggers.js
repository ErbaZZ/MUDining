$(function() {
    $(".tablesearch").hide();
    // Search
    function search() {
        //if (query_value !== '') {
        $.ajax({
            type: "POST",
            url: "restaurants/search.php",
            data: {
                query: $('input#searchbox').val(),
                filter1: $('#filter1').serialize(),
                filter2: $('#filter2').serialize(),
                filter3: $('#slider').val()
            },
            cache: false,
            success: function(html) {
                $(".tablesearch").html(html);
            }
        });
        //}
        return false;
    }

    function useSearchTable($use) {
      clearTimeout($.data(this, 'timer'));
      if (!$use) {
          $(".tablesearch").fadeOut(300);
          $(".populated").fadeIn(300);
      } else {
          $(".tablesearch").fadeIn(300);
          $(".populated").fadeOut(300);
          $(this).data('timer', setTimeout(search, 100));
      };
    }

    $('#filter1').on('change', function() {
        search();
        useSearchTable($(this).serialize() != '');
    });

    $('#filter2').on('change', function() {
        search();
        useSearchTable($(this).serialize() != '');
    });

    $('#slider').on('update', function() {
        search();
        $(this).fade(100);
    });

    $('body').on('keyup', 'input#searchbox', function(e) {
        clearTimeout($.data(this, 'timer'));
        var search_string = $(this).val();
        useSearchTable(search_string != '');
    });

});
