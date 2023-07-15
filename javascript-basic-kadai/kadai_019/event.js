// textというidを持つhtml要素を取得し、定数に代入する
const eventText = document.getElementById('text');

// btnというidを持つhtml要素を取得し、定数に代入する
const eventBtn = document.getElementById('btn');


// btnがクリックされたときにイベント処理を実行する
eventBtn.addEventListener('click', () => {
    
    // textの内容を「ボタンをクリックしました」というテキストに変更する
    eventText.textContent = 'ボタンをクリックしました';

});