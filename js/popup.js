$(document).ready(function() {
    $(".logbutton").click(function(e) {
        $("body").append('<div class="overlay"></div>');
        $(".popup").show();

        $(".close").click(function(e) {
            $(".popup, .overlay").hide();
        });
    });
});
