$(function() {
    // ボタンアニメーション
    $('.button-more').on('mouseover', function() {
        $(this).animate({
            opacity: 0.5,   // 不透明度
            marginLeft: 20,
        }, 100);            // 再生スピード(0.1秒)
    });
    $('.button-more').on('mouseout', function() {
        $(this).animate({
            opacity: 1.0,
            marginLeft: 0
        }, 100);
    });

    // カルーセル
    $('.carousel').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        autoplaySpeed: 5000,
        arrows: false,
    });
});