const resetBtn = document.getElementsById('reset-btn');

/* ----------------------------------------------------
    リセットボタン
---------------------------------------------------- */
resetBtn.addEventListener('click', () => {
    let resultArea = document.querySelector('#comment');
    resultArea.remove();
})