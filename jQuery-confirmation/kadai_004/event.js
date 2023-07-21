$(window).load("event.html", function () {
    console.log('loadイベントが発生しました');
});

$(".box").scroll(eventData, function () {
    console.log('scrollイベントが発生しました');
});