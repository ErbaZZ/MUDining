var range = document.getElementById('slider');
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
    $('.noUi-value-large').filter(function() {
        return $(this).text() == '550';
    }).html('&infin;');
    $('.noUi-value-sub').append(' ฿');
});
