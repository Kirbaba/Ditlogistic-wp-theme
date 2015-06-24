$(function () {
    $('#demo5').scrollbox({
        direction: 'h',
        distance: 134
    });
    $('#demo5-backward').click(function () {
        $('#demo5').trigger('backward');
    });
    $('#demo5-forward').click(function () {
        $('#demo5').trigger('forward');

    });
    $('#demo6').scrollbox({
        direction: 'h',
        distance: 134
    });
    $('#demo6-backward').click(function () {
        $('#demo6').trigger('backward');
    });
    $('#demo6-forward').click(function () {
        $('#demo6').trigger('forward');

    });

    var queueNext = 0;

});