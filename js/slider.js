var range = document.getElementById("slider");
range.style.margin = '10px auto 40px auto';

noUiSlider.create(range, {
    start: [0, 550],
    connect: true,
    step: 50,
    range: {
        'min': 0,
        'max': 550
    },
    pips: {
        mode: 'steps',
        stepped: true,
        density: 50
    }
});
$(function() {
    function searchslider(ppmin, ppmax) {
        $.ajax({
            type: "POST",
            url: "restaurants-search.php",
            data: {
                query: $('input#searchbox').val(),
                filter1: $('#filter1').serialize(),
                filter2: $('#filter2').serialize(),
                pmin: ppmin,
                pmax: ppmax
            },
            cache: false,
            success: function(html) {
                $(".tablesearch").html(html);
            }
        });
    }
    range.noUiSlider.on('end', function(values, handle) {
        searchslider(values[0], values[1]);
        useSearchTable(true, searchslider);
    });
    $('.noUi-value-large').filter(function() {
        return $(this).text() == '550';
    }).html('&infin;');
    $('.noUi-value-sub').append(' ฿');
});
