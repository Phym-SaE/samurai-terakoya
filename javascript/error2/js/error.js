const resetBtn = document.getElementsByClassName('reset-btn');

/* ----------------------------------------------------
    リセットボタン
---------------------------------------------------- */
resetBtn.addEventListener('click', () => {
    let resultArea = document.querySelector('#comment');
    resultArea.remove();
})

