// #textを取得し、定数baseTextに代入する
const baseText = document.getElementById('text');

// #btnを取得し、定数eventBtnに代入する
const eventBtn = document.getElementById('btn');


// btnをクリックしたときにイベント処理を実行する
eventBtn.addEventListener('click', () => {

    // textの中身をクリックされた2秒後に「ボタンがクリックされました」に変更する
    setTimeout(() => {
        baseText.textContent = 'ボタンがクリックされました';
    }, 2000);
});
