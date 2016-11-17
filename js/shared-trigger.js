function useSearchTable(use, fsearch) {
    if (!use) {
        $(".tablesearch").fadeOut(300);
        $(".populated").fadeIn(300);
    } else {
        $(".tablesearch").fadeIn(300);
        $(".populated").hide();
    };
}
