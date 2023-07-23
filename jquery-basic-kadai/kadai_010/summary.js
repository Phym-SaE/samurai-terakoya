$(function() {
    $('#change-color').on('click', function() {
        $('#target').css('color', 'green');
    });

    $('#change-text').on('click', function() {
        $('#target').text('Hello World!');
    });

    $('#fade-out').on('click', function() {
        $('#target').fadeOut();
    });

    $('#fade-in').on('click', function() {
        $('#target').fadeIn();
    });
});